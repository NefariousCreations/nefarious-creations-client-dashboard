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
    <h3><?php _e( 'Welcome back!' ); ?></h3>
    <p class="about-description"><?php _e( 'This is wear you get things.' ); ?></p>
    <div class="welcome-panel-column-container">
        <div class="welcome-panel-column">
            <h4><?php _e( "Let's Get Started" ); ?></h4>
            <a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://your-website.com"><?php _e( 'Call me maybe !' ); ?></a>
            <p class="hide-if-no-customize"><?php printf( __( 'or, <a href="%s">edit your site settings</a>' ), admin_url( 'options-general.php' ) ); ?></p>
        </div><!-- .welcome-panel-column -->
        <div class="welcome-panel-column">
            <h4><?php _e( 'Next Steps' ); ?></h4>
            <ul>
                <?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                <?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edit your front page' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
                <?php else : ?>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
                    <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
                <?php endif; ?>
                <li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'View your site' ) . '</a>', home_url( '/' ) ); ?></li>
            </ul>
        </div><!-- .welcome-panel-column -->
        <div class="welcome-panel-column welcome-panel-last">
            <h4><?php _e( 'More Actions' ); ?></h4>
            <ul>
                <li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>
                <li><?php printf( '<a href="%s" class="welcome-icon welcome-comments">' . __( 'Turn comments on or off' ) . '</a>', admin_url( 'options-discussion.php' ) ); ?></li>
                <li><?php printf( '<a href="%s" class="welcome-icon welcome-learn-more">' . __( 'Learn more about getting started' ) . '</a>', __( 'http://codex.wordpress.org/First_Steps_With_WordPress' ) ); ?></li>
            </ul>
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