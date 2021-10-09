<?php
/**
 * Theme Scripts
 * This file will add the necessary theme styles and scripts
 *
 * @package WordPress
 * @since 1.0
 */

/**
 * Define A Google API Key
 */
if ( ! defined( 'GOOGLE_API_KEY' ) ) :
    define( 'GOOGLE_API_KEY', 'xxx' );
endif;

/**
 * Enqueue theme scripts/styles.
 */
function wpst_add_scripts() {

    /**
     * Main CSS files
     */
    wp_register_style( 'app-styles', THEME_URL . '/assets/css/min/app.min.css' );
    wp_enqueue_style( 'app-styles' );

    /**
     * To customize the styles of this theme without using sass,
     * simply comment out "wp_enqueue_style( 'app-styles' );" above
     * and uncomment the two lines below. This will enable the default
     * "style.css" file to be enqueued without loosing existing styles.
     */
    // wp_register_style( 'main-styles', THEME_URL . '/style.css' );
    // wp_enqueue_style( 'main-styles' );

    $query_args = array(
        'family' => 'Roboto:400,600,700|Open+Sans:300,400',
        'subset' => 'latin,latin-ext',
        'display' => 'swap',
    );
    wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, '//fonts.googleapis.com/css' ), array(), null );

    /**
     * Main Javascript files
     */
    wp_register_script( 'app-js', THEME_URL . '/assets/js/min/app.min.js', array(), '', true );
    wp_localize_script( 'app-js', 'themeJS', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'app-js' );

    /**
     * Native WP comments script.
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    /**
     * Remove default Gutenberg CSS files.
     */
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'wpst_add_scripts' );

/**
 * Theme Login Page Styles
 */
function wpst_login_styles() {
    $query_args = array(
        'family' => 'Roboto:400,600,700|Open+Sans:300,400',
        'subset' => 'latin,latin-ext',
        'display' => 'swap',
    );
    wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, '//fonts.googleapis.com/css' ), array(), null );
    wp_enqueue_style( 'login-styles', THEME_URL . '/assets/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'wpst_login_styles', 10 );

/**
 * Theme admin styles.
 */
function wpst_admin_styles() {
    wp_enqueue_style( 'admin-styles', THEME_URL . '/assets/css/admin.css' );
}
// add_action( 'admin_enqueue_scripts', 'wpst_admin_styles' );

/**
 * Connect the Google API key to ACF.
 */
function wpst_google_maps_api_key() {
    acf_update_setting( 'google_api_key', GOOGLE_API_KEY );
}
add_action('acf/init', 'wpst_google_maps_api_key');