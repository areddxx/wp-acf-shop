<?php

/**
 *  Register WPST Theme custom Options
 *
 *	This file contains the functionality necessary
 *	to integrate ACF custom fields with the theme.
 *
 *	@author Dylan Dunlop <dylan@dylandunlop.com>
 *	@param string $path Path to the ACF directory.
 *  @package WordPress ACF
 *	@since 1.0
 */

$site_name = get_bloginfo('title');

function wpst_acf_settings_path($path)
{

    // Update path.
    $path = THEME_DIR . '/admin/acf/';

    // Return.
    return $path;
}
add_filter('acf/settings/path', 'wpst_acf_settings_path');

function wpst_acf_settings_dir($dir)
{

    // Update path.
    $dir = THEME_URL . '/admin/acf/';

    // Return.
    return $dir;
}
add_filter('acf/settings/dir', 'wpst_acf_settings_dir');


/**
 * Save JSON files when fields are created/updated
 */
function wpst_acf_json_save_point($path)
{

    // update path
    $path = THEME_DIR . '/admin/acf/acf-json';

    // return
    return $path;
}
add_filter('acf/settings/save_json', 'wpst_acf_json_save_point');

/**
 * Load JSON files on theme load.
 *
 */
function wpst_acf_json_load_point($paths)
{

    // remove original path (optional)
    unset($paths[0]);

    //append path
    $paths[] = THEME_DIR . '/admin/acf/acf-json';

    // return
    return $paths;
}
add_filter('acf/settings/load_json', 'wpst_acf_json_load_point');

// Hide the "Custom Fields" menu option.
function wpst_acf_hide_acf_admin()
{

    // get the current site url
    $site_url = home_url();

    // an array of protected site urls
    $valid_urls = array(
        'https://shop.test',
    );

    // check if the current site url is in the valid urls array
    if (in_array($site_url, $valid_urls)) return true;
    return false;
}
add_filter('acf/settings/show_admin', 'wpst_acf_hide_acf_admin');

// Get the ACF Framework Files.
include_once(THEME_DIR . '/admin/acf/acf.php');
include_once(THEME_DIR . '/admin/acf/acf-rgba-color-master/acf-rgba-color.php');

// Register a Theme Options page.
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => $site_name . ' Settings',
        'menu_title'    => $site_name,
        'menu_slug'     => 'wpst-settings',
        'capability'    => 'manage_options',
        'icon_url'         => 'dashicons-admin-settings',
        'redirect'        => true
    ));

    acf_add_options_sub_page(array(
        'page_title'     => $site_name . ' Settings',
        'menu_title'    => 'Settings',
        'parent_slug'    => 'wpst-settings',
    ));
}
