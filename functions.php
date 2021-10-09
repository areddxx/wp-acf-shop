<?php
/**
 * Theme Functions
 *
 * This file contains all necessary functionality
 * to make the theme operate.
 *
 * @package WordPress
 * @since 1.0
 */

// Define Theme constants.
if ( ! defined( 'THEME_DIR' ) && ! defined( 'THEME_URL' ) ) :
	define( 'THEME_DIR', get_template_directory() );
	define( 'THEME_URL', get_template_directory_uri() );
endif;

/**
 * Require additional files
 */
require_once( THEME_DIR . '/admin/theme/theme-functions.php' );
require_once( THEME_DIR . '/admin/ajax/ajax-functions.php' );
require_once( THEME_DIR . '/admin/post-types/register-post-types.php' );
require_once( THEME_DIR . '/admin/acf/register-acf.php' );