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

/**
 * Replace the default welcome dashboard message
 */
remove_action('welcome_panel', 'wp_welcome_panel' );
add_action('welcome_panel', function (){ ?>

    <div class="custom-welcome-panel-content">
    <h1><?php _e( 'Welcome back!' ); ?></h1>
    <p class="about-description"><?php _e( 'This is where you get things.' ); ?></p>
    <div class="welcome-panel-column-container">
        <div class="welcome-panel-column">
            <h4><?php _e( "Let's Get Started" ); ?></h4>
            <a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://your-website.com"><?php _e( 'Call me maybe !' ); ?></a>
        </div><!-- .welcome-panel-column -->
        <div class="welcome-panel-column">
            
        </div><!-- .welcome-panel-column welcome-panel-last -->
    </div><!-- .welcome-panel-column-container -->
    <div><!-- .custom-welcome-panel-content -->

<?php });

/**
 * Remove selected default dashboard widgets
 */
add_action( 'admin_init', function () {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
//    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
//    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
//    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
});