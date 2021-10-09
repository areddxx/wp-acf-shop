<?php
/**
 * Theme Shortcodes
 *
 * Contains the shortcodes for use with the theme.
 *
 * @package WordPress
 * @since 1.0
 */

/**
 * Social Links
 *
 * Generates the social icons list.
 *
 * @package WordPress
 * @since 1.0
 */
function wpst_social_links_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'show_names' => '',
		),
		$atts, 'social_links'
	);

	ob_start();
	get_template_part( 'partials/components/social', 'links', ['atts' => $atts] );
	return ob_get_clean();

}
add_shortcode( 'social_links', 'wpst_social_links_shortcode' );
