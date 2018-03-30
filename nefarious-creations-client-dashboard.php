<?php
/**
 * Plugin Name: Nefarious Creations Client Dashboard
 * Plugin URI: https://github.com/NefariousCreations/nefarious-creations-client-dashboard
 * Description: This is a customised WordPress dashboard for Nefarious Creations clients.
 * Version: 1.0.1
 * Author: Nefarious Creations
 * Author URI: https://nefariouscreations.com.au
 */

/**
 * Load Style Sheets
 */

// Dashboard Style Sheet
function admin_dashboard_styles() {
    wp_enqueue_style('dashboard-styles', plugins_url('resources/assets/styles/dashboard.css', __FILE__));
}

// Admin Bar Style Sheet
function admin_bar_styles() {
    wp_enqueue_style('admin-bar-styles', plugins_url('resources/assets/styles/admin-bar.css', __FILE__));
}

// Enqueue Dashboard and Admin Bar Style for Admin Area
add_action('admin_enqueue_scripts', 'admin_dashboard_styles');
add_action('admin_enqueue_scripts', 'admin_bar_styles');

// Enqueue Admin Styles For Login Screen
add_action('login_enqueue_scripts', 'admin_dashboard_styles');

// Enqueue Admin Bar Styles For Front End
add_action('wp_enqueue_scripts', 'admin_bar_styles');

/**
 * Custom WordPress Admin Overrides
 */

// Custom Admin Signature
add_filter('admin_footer_text', function (){
    echo '<span id="footer-note">From your friends at <a href="https://nefariouscreations.com.au" target="_blank">Nefarious Creations</a>.</span>';
});
