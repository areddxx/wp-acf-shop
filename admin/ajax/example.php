<?php
/**
 * Theme ajax functions.
 *
 * This file contains the Ajax functions for the theme.
 *
 * @package WordPress
 * @since 1.0
 */

/**
* Filter blog post categories.
*/
function load_more_posts_func() {

	// if ( ! wp_verify_nonce( wp_unslash( $_REQUEST['nonce'] ), 'nonce-name' ) ) {
	// 	exit( 'No naughty business please' );
	// }
	$result = [];
	$posts_per_page = isset( $_REQUEST['posts_per_page'] ) ? intval( $_REQUEST['posts_per_page'] ) : get_option( 'posts_per_page' );
	$next_page = isset( $_REQUEST['next_page'] ) ? intval($_REQUEST['next_page']) : null;

	$result['next_page'] = $next_page;

	ob_start();

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $posts_per_page,
		'paged' => $next_page,
		// 'no_found_rows' => true, // useful when pagination is not needed.
		// 'update_post_meta_cache' => false, // useful when post meta will not be utilized.
		// 'update_post_term_cache' => false, // useful when taxonomy terms will not be utilized.
		// 'fields' => 'ids', // useful when only the post IDs are needed (less typical).
	);

	$new_posts = new WP_Query( $args );

	if ( $new_posts->have_posts() ) :
		while ( $new_posts->have_posts() ) : $new_posts->the_post();
			get_template_part( 'partials/content/content', 'index' );
		endwhile;
		wp_reset_postdata();
	else :
		wp_send_json_error('No more posts!');
	endif;

	$result['html'] = ob_get_clean();
	$result = wp_json_encode( $result );
	echo $result;

	wp_die();
}
add_action( 'wp_ajax_load_more_posts', 'load_more_posts_func' );
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts_func' );
