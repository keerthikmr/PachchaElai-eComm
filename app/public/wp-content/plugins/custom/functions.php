<?php

/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * functions.php
 * Add PHP snippets here
 */

function register_custom_endpoint()
{
    // Push to custom_customer table
    register_rest_route('custom/v1', '/sync-data', array(
        'methods' => 'POST',
        'callback' => 'sync_data_to_wp',
        'permission_callback' => '__return_true', // Remove in prod
    ));

    register_rest_route(
        'custom/v1',
        '/fetch-leads',
        array(
            'methods' => 'GET',
            'callback' => 'fetch_leads',
            'permission_callback' => '__return_true',
            'args' => array(
                'helper_id' => array(
                    'required' => true,
                    'validate_callback' => function ($param, $request, $key) {
                        return is_numeric($param);
                    },
                ),
            )
        )
    );

    register_rest_route('custom/v1', '/set-hold-flag', array(
        'methods' => 'POST',
        'callback' => 'set_hold_flag',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('custom/v1', '/remove-hold-flag', array(
        'methods' => 'POST',
        'callback' => 'remove_hold_flag',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('custom/v1', '/set-no-interest-flag', array(
        'methods' => 'POST',
        'callback' => 'set_no_interest_flag',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('custom/v1', '/get-helper-id', array(
        'methods' => 'POST',
        'callback' => 'get_helper_id',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('custom/v1', '/mark-done', array(
        'methods' => 'POST',
        'callback' => 'mark_done',
        'permission_callback' => '__return_true',
    ));
}

add_action('rest_api_init', 'register_custom_endpoint');

function fetch_leads(WP_REST_Request $request)
{
    global $wpdb;
    $table_name = 'custom_customer';

    $helper_id = $request->get_param('helper_id');

    $count_current = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name WHERE helper_id = %d AND hold_flag = 0",
            $helper_id
        )
    );

    if ($count_current[0]->{"COUNT(*)"} <= 10) {
        $assign_more = 10 - $count_current[0]->{"COUNT(*)"};

        $unatten_leads = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT mobile_number
         FROM $table_name
         WHERE interest_flag = 1
           AND helper_id IS NULL
         ORDER BY priority_flag DESC, interest_time DESC
         LIMIT %d",
                $assign_more
            )
        );

        if (!empty($unatten_leads)) {

            // Assign the lead to the caller
            foreach ($unatten_leads as $lead) {
                $wpdb->update(
                    $table_name,
                    array('helper_id' => $helper_id),
                    array('mobile_number' => $lead->mobile_number),
                    array('%d'),
                    array('%d')
                );
            }
        }
    }

    // Get customers who don't already have a caller assigned and also have the interest flag 1
    $leads = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT mobile_number, check_in_time, interest_time, interest_flag, hold_flag FROM $table_name WHERE helper_id = %d ORDER BY interest_time",
            $helper_id
        )
    );

    if (!empty($leads)) {
        return new WP_REST_Response(
            array(
                'success' => true,
                'message' => 'Leads fetched successfully.',
                'data' => $leads,
            ),
            200
        );
    }

    return new WP_REST_Response(
        array(
            'success' => false,
            'message' => 'No leads found.',
        ),
        500
    );
}

function mark_done(WP_REST_Request $request)
{
    $mobile_number = $request->get_param('mobile_number');

    global $wpdb;
    $customer_table = 'custom_customer';

    $order_table = 'custom_order';

    $recentOrder = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT order_time FROM $order_table WHERE customer_number = %s ORDER BY order_time DESC LIMIT 1",
            $mobile_number
        )
    );

    $interest_time = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT interest_time FROM $customer_table WHERE mobile_number = %s",
            $mobile_number
        )
    );

    $interest_time = strtotime($interest_time[0]->interest_time) - 900;

    // 15 minute buffer
    if ($recentOrder == null) {
        return new WP_REST_Response(array(
            'success' => false,
            'message' => 'Order not found.',
        ), 500);
    }
    $order_timestamp = strtotime($recentOrder[0]->order_time);

    if ($interest_time < $order_timestamp) {
        $updated = $wpdb->update(
            $customer_table,
            array(
                'interest_flag' => 0,
                'interest_time' => null,
                'helper_id' => null,
            ),
            array('mobile_number' => $mobile_number),
            array('%d', '%s', '%d'),
            array('%s')
        );
        if ($updated !== false) {
            return new WP_REST_Response(array(
                'success' => true,
                'message' => 'Lead marked as done.',
            ), 200);
        }
    }

    return new WP_REST_Response(array(
        'success' => false,
        'message' => 'Failed to mark lead as done.',
    ), 500);
}

function sync_data_to_wp(WP_REST_Request $request)
{
    $data = $request->get_json_params();

    // Try to insert data
    if (!empty($data)) {
        $sheetNumber = sanitize_text_field($data['sheetNumber']);
        $checkInTime = sanitize_text_field($data['checkInTime']);
        $customerNumber = sanitize_text_field($data['customerNumber']);
        $productID = sanitize_text_field($data['productID']);

        global $wpdb;
        $table_name = 'custom_customer';

        $statusCheck = $wpdb->insert(
            $table_name,
            array(
                'sheet_number' => $sheetNumber,
                'check_in_time' => $checkInTime,
                'mobile_number' => $customerNumber,
                'interest_flag' => 1,
                'interest_time' => current_time('mysql'),
            ),
            array(
                '%d',
                '%s',
                '%s',
                '%d',
                '%s',
            )
        );

        if ($statusCheck !== 1) {
            $isDuplicate = check_duplicates(sanitize_text_field($data['customerNumber']));
            if ($isDuplicate) {
                $enable_status = enable_interest_flag(sanitize_text_field($data['customerNumber']), sanitize_text_field($data['productID']));

                if ($enable_status) {
                    return new WP_REST_Response(
                        array(
                            'success' => true,
                            'message' => 'Duplicate found. Interest flag enabled.',
                        ),
                        200
                    );
                } else {
                    return new WP_REST_Response(
                        array(
                            'success' => false,
                            'message' => 'Duplicate found. Order is recent',
                        ),
                        500
                    );
                }
            } else {
                return new WP_REST_Response(
                    array(
                        'success' => false,
                        'message' => 'Failed to sync data with WordPress.',
                    ),
                    500
                );
            }
        }

        return new WP_REST_Response(
            array(
                'success' => true,
                'message' => 'Data successfully synced with WordPress.',
                'data' => $data,
                $table_name,
            ),
            200
        );
    }

    return new WP_REST_Response(
        array(
            'success' => false,
            'message' => 'No data provided.',
        ),
        400
    );
}

function set_hold_flag(WP_REST_Request $request)
{

    $mobile_number = $request->get_param('mobile_number');
    $helper_id = $request->get_param('helper_id');

    global $wpdb;

    $table_name = 'custom_customer';

    $hold_count = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT COUNT(*) FROM $table_name WHERE helper_id = %d AND hold_flag = 1",
            $helper_id
        )
    );

    error_log(print_r($hold_count, true));

    if ($hold_count[0]->{"COUNT(*)"} >= 20) {
        return new WP_REST_Response(array(
            'success' => false,
            'message' => 'Hold limit reached.',
        ), 500);
    }

    $updated = $wpdb->update(
        $table_name,
        array('hold_flag' => 1, 'hold_flag_time' => current_time('mysql')),
        array('mobile_number' => $mobile_number),
        array('%d', '%s'),
        array('%s')
    );

    if ($updated !== false) {
        return new WP_REST_Response(array(
            'success' => true,
            'message' => 'Hold flag updated successfully.',
        ), 200);
    }

    return new WP_REST_Response(array(
        'success' => false,
        'message' => 'Hold flag update failed',
    ), 500);
}

function remove_hold_flag(WP_REST_Request $request)
{

    $mobile_number = $request->get_param('mobile_number');

    if (empty($mobile_number)) {
        return new WP_REST_Response(array(
            'success' => false,
            'message' => 'Mobile number is required.',
        ), 400);
    }

    global $wpdb;

    $table_name = 'custom_customer';

    $updated = $wpdb->update(
        $table_name,
        array('hold_flag' => 0),
        array('mobile_number' => $mobile_number),
        array('%d'),
        array('%s')
    );

    if ($updated !== false) {
        return new WP_REST_Response(array(
            'success' => true,
            'message' => 'Hold flag updated successfully.',
        ), 200);
    }

    return new WP_REST_Response(array(
        'success' => false,
        'message' => 'Failed to update the hold flag. Please check the mobile number.',
    ), 500);
}

function set_no_interest_flag(WP_REST_Request $request)
{

    $mobile_number = $request->get_param('mobile_number');

    if (empty($mobile_number)) {
        return new WP_REST_Response(array(
            'success' => false,
            'message' => 'Mobile number is required.',
        ), 400);
    }

    global $wpdb;

    $table_name = 'custom_customer';

    $updated = $wpdb->update(
        $table_name,
        array('interest_flag' => 0),
        array('mobile_number' => $mobile_number),
        array('%d'),
        array('%s')
    );

    if ($updated !== false) {
        return new WP_REST_Response(array(
            'success' => true,
            'message' => 'Interest flag disabled.',
        ), 200);
    }

    return new WP_REST_Response(array(
        'success' => false,
        'message' => 'Failed to disable interst flag.',
    ), 500);
}

function check_duplicates($customerNumber)
{
    global $wpdb;
    $table_name = 'custom_customer';

    $check_duplicates = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE mobile_number = %s",
            $customerNumber
        )
    );

    if (!empty($check_duplicates)) {
        return true;
    } else {
        return false;
    }
}

function enable_interest_flag($mobileNumber, $productID)
{

    if (check_order_time($mobileNumber, $productID)) {
        global $wpdb;
        $table_name = 'custom_customer';

        $wpdb->query(
            $wpdb->prepare(
                "UPDATE $table_name SET interest_flag = 1 WHERE mobile_number = %s",
                $mobileNumber
            )
        );
        return true;
    } else {
        return false;
    }
}

function check_order_time($mobileNumber, $productID)
{
    global $wpdb;
    $table_name = 'custom_order';

    $order_time = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT order_time FROM $table_name WHERE customer_number = %s and product_id = %d order by order_time desc",
            $mobileNumber,
            $productID
        )
    );

    error_log(print_r($order_time, true));
    // if interest_time has a difference of more than 1 week from current time, set interest_flag to 1
    $order_timestamp = strtotime($order_time[0]->order_time);

    $current_timestamp = time();

    $time_diff = $current_timestamp - $order_timestamp;

    $one_week = 604800;

    if ($time_diff > $one_week) {
        return true; // Been more than a week, enable interest flag
    } else {
        return false; // Order is recent, dismiss request
    }
}

function get_helper_id(WP_REST_Request $request)
{
    $mobile_number = $request->get_param('mobile_number');

    global $wpdb;
    $table_name = 'custom_customer';

    $helper_id = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT helper_id FROM $table_name WHERE mobile_number = %s",
            $mobile_number
        )
    );

    if (!empty($helper_id)) {
        return new WP_REST_Response(
            array(
                'success' => true,
                'message' => 'Helper found.',
                'data' => $helper_id,
            ),
            200
        );
    }

    return new WP_REST_Response(
        array(
            'success' => false,
            'message' => 'Helper not found.',
        ),
        500
    );
}

add_action('my_custom_daily_task', 'run_my_daily_task');

run_my_daily_task();
function run_my_daily_task()
{
    global $wpdb;

    $table_name = 'custom_customer';

    // Release hold flag if it has been more than 24 hours
    $hold_times = $wpdb->get_results(
        "SELECT mobile_number, hold_flag_time FROM $table_name WHERE hold_flag = 1"
    );

    foreach ($hold_times as $row) {
        $hold_flag_time = $row->hold_flag_time;

        $hold_flag_timestamp = strtotime($hold_flag_time);

        if (time() - $hold_flag_timestamp >= 86400) {
            $wpdb->update(
                $table_name,
                array(
                    'hold_flag_time' => null,
                    'hold_flag' => 0,
                    'helper_id' => null,
                ),
                array(
                    'mobile_number' => $row->mobile_number,
                ),
                array(
                    '%s',
                    '%d',
                    '%d',
                ),
                array(
                    '%s',
                )
            );
        }
    }

    // Set priority flag if interest time is more than 3 days
    $wait_time = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT mobile_number FROM $table_name WHERE interest_flag = 1 and interest_time < %s",
            date('Y-m-d H:i:s', strtotime('-3 days'))
        )
    );

    foreach ($wait_time as $waiting_customer) {
        $wpdb->update(
            $table_name,
            array(
                'priority_flag' => 1,
            ),
            array(
                'mobile_number' => $waiting_customer->mobile_number,
            ),
            array(
                '%d',
            ),
            array(
                '%s',
            )
        );
    }

    // Purge not interested data older than 3 days
    $not_interested = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT mobile_number FROM $table_name WHERE interest_flag = 0 and interest_time < %s",
            date('Y-m-d H:i:s', strtotime('-3 days'))
        )
    );

    foreach ($not_interested as $no_interest_cust) {
        $wpdb->delete(
            $table_name,
            array('mobile_number' => $no_interest_cust->mobile_number),
            array('%d')
        );
    }

    error_log('Daily database task executed at ' . current_time('mysql'));
}

function enqueue_my_custom_script()
{
    if (is_page('caller-page')) {
        wp_enqueue_script(
            'caller-page-script',
            get_template_directory_uri() . '../../../plugins/custom/js/caller-page.js',
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_my_custom_script');

function enqueue_datatables_scripts()
{
    // Enqueue DataTables CSS from CDN
    wp_enqueue_style('datatables-css', 'https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css');

    // Enqueue jQuery (since DataTables requires jQuery)
    wp_enqueue_script('jquery');

    // Enqueue DataTables JS from CDN
    wp_enqueue_script('datatables-js', 'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js', array('jquery'), null, true);

    // Add custom JS for initializing DataTables
    wp_add_inline_script('datatables-js', "
        jQuery(document).ready(function($) {
            $('#leadsTable').DataTable({
                columnDefs: [
                    {
                        targets: [0],
                        type: 'numeric'
                    }
                ]
            });
        });
    ");
}

add_action('wp_enqueue_scripts', 'enqueue_datatables_scripts');

function add_cors_headers()
{

    header("Access-Control-Allow-Origin: http://pachchaelai.local");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
}

add_action('init', 'add_cors_headers');
