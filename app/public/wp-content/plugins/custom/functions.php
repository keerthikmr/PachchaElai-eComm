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

    register_rest_route('custom/v1', '/get-products', array(
        'methods' => 'GET',
        'callback' => 'get_products',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('custom/v1', '/get-user-id', array(
        'methods' => 'GET',
        'callback' => 'get_user_ID',
        'permission_callback' => '__return_true',
    ));

    register_rest_route('custom/v1', '/export-csv', array(
        'methods' => 'GET',
        'callback' => 'export_csv',
        'permission_callback' => '__return_true',
    ));

    register_rest_route(
        'custom/v1',
        '/set-order',
        array(
            'methods' => 'POST',
            'callback' => 'set_order',
            'permission_callback' => '__return_true',
        )
    );
}

add_action('rest_api_init', 'register_custom_endpoint');

add_action('wp_loaded', 'send_user_id_to_api');

function send_user_id_to_api()
{
    if (is_user_logged_in()) {
        global $current_user_id;
        $current_user_id = get_current_user_id();
        error_log('Current User ID: ' . $current_user_id);
        // my_custom_api_function($current_user_id);
        global $this_var;
        $this_var = $current_user_id;
        // return $current_user_id;
    }
}

function fetch_leads(WP_REST_Request $request)
{
    $helper_id = $request->get_param('helper_id');
    global $wpdb;
    $table_name = 'custom_customer';

    error_log('Helper ID: ' . $helper_id);

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
            'message' => `No leads found. for ` . $helper_id,
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

    // 15 minute buffer
    $interest_time = strtotime($interest_time[0]->interest_time) - 900;

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
                'priority_flag' => 0,
                'interest_flag' => 0,
                'interest_time' => null,
                'helper_id' => null,
            ),
            array('mobile_number' => $mobile_number),
            array('%d', '%d', '%s', '%d'),
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
        array(
            'interest_flag' => 0,
            'helper_id' => 0
        ),
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

function get_helper_id($param)
{

    if ($param instanceof WP_REST_Request) {
        $mobile_number = $param->get_param('mobile_number');
    } else {
        $mobile_number = $param;
        error_log(print_r($mobile_number, true));
    }
    // $mobile_number = $request->get_param('mobile_number');

    global $wpdb;
    $table_name = 'custom_customer';

    $helper_id = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT helper_id FROM $table_name WHERE mobile_number = %s",
            $mobile_number
        )
    );

    if (!empty($helper_id)) {
        if ($param instanceof WP_REST_Request) {
            return new WP_REST_Response(
                array(
                    'success' => true,
                    'message' => 'Helper found.',
                    'data' => $helper_id,
                ),
                200
            );
        } else {
            return $helper_id[0]->helper_id;
        }
    }

    return new WP_REST_Response(
        array(
            'success' => false,
            'message' => 'Helper not found.',
        ),
        500
    );
}

function get_products()
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'fields' => 'ids',
    );

    $product_ids = get_posts($args);

    $product_data = array();
    foreach ($product_ids as $product_id) {
        $product_data[] = array(
            'ID' => $product_id,
            'post_title' => get_the_title($product_id),
        );
    }

    if (!empty($product_data)) {
        return new WP_REST_Response(
            array(
                'success' => true,
                'message' => 'Products fetched successfully.',
                'data' => $product_data,
            ),
            200
        );
    }

    return new WP_REST_Response(
        array(
            'success' => false,
            'message' => 'No products found.',
        ),
        500
    );
}

function set_order(WP_REST_Request $request)
{
    $data = $request->get_json_params();
    $customer_table = 'custom_customer';

    error_log(print_r($data, true));

    if (!empty($data)) {
        $customer_name = sanitize_text_field($data['name']);
        $customer_number = sanitize_text_field($data['number']);
        $alternate_mobile = sanitize_text_field($data['alternate_mobile']);
        $product_name = sanitize_text_field($data['products']);
        $city = sanitize_text_field($data['city']);
        $state = sanitize_text_field($data['state']);
        $pincode = sanitize_text_field($data['pincode']);
        $address = sanitize_text_field($data['address']);
        $helper_id = get_helper_id($customer_number);

        error_log(print_r($helper_id, true));

        global $wpdb;
        $table_name = 'custom_order';

        $statusCheck = $wpdb->insert(
            $table_name,
            array(
                'customer_name' => $customer_name,
                'customer_number' => $customer_number,
                'alternate_number' => $alternate_mobile,
                'helper_id' => $helper_id,
                'order_time' => current_time('mysql'),
                'pincode' => $pincode,
                'city' => $city,
                'state' => $state,
                'address' => $address,
                'product_name' => $product_name,
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%d',
                '%s',
                '%d',
                '%s',
                '%s',
                '%s',
                '%s',
            )
        );

        if ($statusCheck !== 1) {
            return new WP_REST_Response(
                array(
                    'success' => false,
                    'message' => 'Failed to set order.',
                ),
                500
            );
        }
        $wpdb->update(
            $customer_table,
            array(
                'priority_flag' => 0,
                'interest_flag' => 0,
                'interest_time' => null,
                'helper_id' => null,
            ),
            array('mobile_number' => $customer_number),
            array('%d', '%d', '%s', '%d'),
            array('%s')
        );

        return new WP_REST_Response(
            array(
                'success' => true,
                'message' => 'Order set successfully.',
                'data' => $data,
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

function get_user_ID()
{
    global $current_user_id;

    return new WP_REST_Response(
        array(
            'success' => true,
            'message' => 'Helper ID found.',
            'data' => $current_user_id,
        ),
        200
    );

    // if (is_user_logged_in()) {
    //     $helper_id = wp_get_current_user()->ID;

    //     return new WP_REST_Response(
    //         array(
    //             'success' => true,
    //             'message' => 'Helper ID found.',
    //             'data' => $helper_id,
    //         ),
    //         200
    //     );
    // } else {

    //     return new WP_REST_Response(
    //         array(
    //             'success' => false,
    //             'message' => 'No user logged in.',
    //         ),
    //         500
    //     );
    // }
}


function prepare_order_format($order_id)
{

    global $wpdb;
    $table_name = 'custom_order';

    $order_data = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE order_id = %d",
            $order_id
        )
    );

    if (empty($order_data)) {
        return new WP_REST_Response(
            array(
                'success' => false,
                'message' => 'No data found for order.',
            ),
            404
        );
    }

    $order_data = $order_data[0];

    $order_data = array(
        'order_id' => $order_id,
        'pickup_location' => 'Valasaravakkam', // Change this later
        'Transport Mode' => 'Surface', // Change this later
        'Payment Mode' => 'COD', // Change this later
        'COD Amount' => 245, // Change this later
        'Customer Name' => $order_data->customer_name,
        'Customer Phone' => $order_data->customer_number,
        'Shipping Address Line 1' => $order_data->address,
        'Shipping Address Line 2' => '',
        'Shipping City' => $order_data->city,
        'Shipping State' => $order_data->state,
        'Shipping Pincode' => $order_data->pincode,
        'Item Sku Code' => 'SKU123', // Change this later
        'Item Sku Name' => "Pachchaelai Ortho Oil", // Change this later
        'Quantity' => 1, // Change this later
        'Unit Item Price' => 245, // Change this later
        'Length (cm)' => 10, // Change this later
        'Breadth (cm)' => 10, // Change this later
        'Height (cm)' => 10, // Change this later
        'Weight (gm)' => 70, // Change this later
        'Fragile Shipment' => '', // Change this later
        'Discount Type' => '', // Change this later
        'Discount Value' => '', // Change this later
        'Tax Class Code' => '', // Change this later
        'Customer Email' => '', // Change this later
        'Billing Address same as Shipping Address' => 'Yes', // Change this later
        'Billing Address Line 1' => '',
        'Billing Address Line 2' => '',
        'Billing City' => '',
        'Billing State' => '',
        'Billing Pincode' => '',
        'Seller Name' => 'Pachchaelai', // Change this later
        'Seller GST Number' => '', // Change this later
        'Seller Address Line1' => 'PachchaElai NaturoCare, Ph: 8610830573 , 9080566666',
        'Seller Address Line2' => '',
        'Seller City' => 'Chennai',
        'Seller State' => 'Tamil Nadu',
        'Seller Pincode' => '600087',
    );

    return $order_data;
}

function export_csv()
{
    // global $wpdb;

    // $table_name = 'custom_customer';
    // $leads = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    // if (empty($leads)) {
    //     return new WP_REST_Response(
    //         array(
    //             'success' => false,
    //             'message' => 'No data found to export.',
    //         ),
    //         404
    //     );
    // }

    global $wpdb;
    $table_name = 'custom_order';

    $order_ids = $wpdb->get_results(
        "SELECT order_id FROM $table_name",
        ARRAY_A
    );

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="leads.csv"');

    $output = fopen('php://output', 'w');

    $titles = ['order_id', 'pickup_location', 'Transport Mode', 'Payment Mode', 'COD Amount', 'Customer Name', 'Customer Phone', 'Shipping Address Line 1', 'Shipping Address Line 2', 'Shipping City', 'Shipping State', 'Shipping Pincode', 'Item Sku Code', 'Item Sku Name', 'Quantity', 'Unit Item Price', 'Length (cm)', 'Breadth (cm)', 'Height (cm)', 'Weight (gm)', 'Fragile Shipment', 'Discount Type', 'Discount Value', 'Tax Class Code', 'Customer Email', 'Billing Address same as Shipping Address', 'Billing Address Line 1', 'Billing Address Line 2', 'Billing City', 'Billing State', 'Billing Pincode', 'Seller Name', 'Seller GST Number', 'Seller Address Line1', 'Seller Address Line2', 'Seller City', 'Seller State', 'Seller Pincode'];

    fputcsv($output, $titles);

    foreach ($order_ids as $order_id) {
        $order_data = prepare_order_format($order_id);
        fputcsv($output, $order_data);
    }

    fclose($output);
    exit;
}


add_action('custom_daily_task', 'daily_task');

function daily_task()
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

function enqueue_custom_scripts()
{
    if (is_page('caller-page')) {
        wp_enqueue_script(
            'caller-page-script',
            get_template_directory_uri() . '../../../plugins/custom/js/caller-page.js',
            null,
            true
        );
    }
    if (is_page('admin')) {
        wp_enqueue_script(
            'admin-page-script',
            get_template_directory_uri() . '../../../plugins/custom/js/admin-page.js',
            null,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

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

    header("Access-Control-Allow-Origin: https://ecom-technically-inspiring-widget.wpcomstaging.com/");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");
}

add_action('init', 'add_cors_headers');
