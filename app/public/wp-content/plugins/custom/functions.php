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
    register_rest_route('custom/v1', '/sync-data', array(
        'methods' => 'POST',
        'callback' => 'sync_data_to_wp',
        'permission_callback' => '__return_true',
    ));
}

add_action('rest_api_init', 'register_custom_endpoint');

function sync_data_to_wp(WP_REST_Request $request) {
    $data = $request->get_json_params();
    
    if (!empty($data)) {
        $sheetNumber = sanitize_text_field($data['sheetNumber']);
        $checkInTime = sanitize_text_field($data['checkInTime']);
        $customerNumber = sanitize_text_field($data['customerNumber']);
        
        global $wpdb;
        $table_name = 'custom_customer';
        
        $wpdb->insert(
            $table_name,
            array(
                'sheet_number' => $sheetNumber,
                'check_in_time' => $checkInTime,
                'mobile_number' => $customerNumber,
            ),
            array(
                '%d',
                '%s',
                '%s', 
            )
        );

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

function add_cors_headers() {
    // Allow cross-origin requests from Google Apps Script
    header("Access-Control-Allow-Origin: https://script.google.com");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
}

add_action('init', 'add_cors_headers');


