<?php
/*
Plugin Name: IP Country Dashboard
Description: Displays current IP address and country in the dashboard header.
Version: 1.0
Author: Negar Kazemnejad 1403 | 2024
*/

// Display IP and Country in WordPress dashboard header
function display_ip_country_in_dashboard() {
    $ip_info = json_decode(file_get_contents('https://ipinfo.io/json'));
    if ($ip_info && isset($ip_info->ip) && isset($ip_info->country)) {
        echo '<p>IP: ' . $ip_info->ip . '</p>';
        echo '<p>Country: ' . $ip_info->country . '</p>';
    }
}
add_action('admin_notices', 'display_ip_country_in_dashboard');
