<?php
/*
Plugin Name: IP Country Dashboard
Description: Displays current IP address and country in the dashboard header.
Version: 1.0
Author: Negar Kazemnejad 1403 | 2024
*/


// Display IP and Country in WordPress dashboard header
function display_ip_country_in_dashboard() {
    // Make sure the function wp_remote_get is available
    if ( !function_exists('wp_remote_get') ) {
        return;
    }

    // Fetch IP and Country information using WordPress HTTP API
    $response = wp_remote_get('https://ipinfo.io/json');
    if ( is_wp_error( $response ) ) {
        return;
    }

    $body = wp_remote_retrieve_body( $response );
    $ip_info = json_decode( $body );

    if ( $ip_info && isset( $ip_info->ip ) && isset( $ip_info->country ) ) {
        echo '<p>IP: ' . esc_html( $ip_info->ip ) . '</p>';
        echo '<p>Country: ' . esc_html( $ip_info->country ) . '</p>';
    }
}
add_action('admin_notices', 'display_ip_country_in_dashboard');

