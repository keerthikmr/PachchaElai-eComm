<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * functions.php
 * Add PHP snippets here
 */

function register_custom_endpoint() {
    // Push to custom_customer table
    register_rest_route('custom/v1', '/sync-data', array(
        'methods' => 'POST',
        'callback' => 'sync_data_to_wp',
        'permission_callback' => '__return_true', // Remove in prod
    ));

    register_rest_route('custom/v1', '/fetch-leads', array(
        'methods'             => 'GET',
        'callback'            => 'fetch_leads',
        'permission_callback' => '__return_true',
    ));
}
    	
add_action('rest_api_init', 'register_custom_endpoint');

function fetch_leads(WP_REST_Request $request) {
    global $wpdb;
    $table_name = 'custom_customer';

    $limit = 10;
    
    $leads = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT mobile_number, check_in_time, interest_time FROM $table_name WHERE interest_flag = 1 order by interest_time desc LIMIT %d",
            $limit
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
        404
    );
}

function sync_data_to_wp(WP_REST_Request $request) {
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
                }
                else {
                    return new WP_REST_Response(
                        array(
                            'success' => false,
                            'message' => 'Duplicate found. Order is recent',
                        ), 
                        500
                    );
                }
            }
            else {
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
                'data' => $data, $table_name,
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

function check_duplicates($customerNumber) {
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

function enable_interest_flag($mobileNumber, $productID) {
    
    if (check_order_time($mobileNumber, $productID)){
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

function check_order_time($mobileNumber, $productID) {
    global $wpdb;
    $table_name = 'custom_order';

    $order_time = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT order_time FROM $table_name WHERE customer_number = %s and product_id = %d order by order_time desc",
            $mobileNumber, $productID
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

function enqueue_my_custom_script() {
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

function enqueue_datatables_scripts() {
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

function add_cors_headers() {

    header("Access-Control-Allow-Origin: http://pachchaelai.local");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
}

add_action('init', 'add_cors_headers');