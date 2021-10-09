<?php
/**
 * Example ajax using WP REST API
 */
class WPST_REST extends WP_REST_Controller
{

	/**
	 * Register REST API Routes.
	 */
	public function register_routes(){

		register_rest_route('wpst/v1', '/get_posts/(?P<page>\d+)', [
			'methods' => WP_REST_Server::READABLE, // GET
			// 'methods' => WP_REST_Server::EDITABLE, // POST,PUT,PATCH
			// 'methods' => WP_REST_Server::DELETABLE, // DELETE
			// 'methods' => WP_REST_Server::ALLMETHODS, // GET, POST,PUT,PATCH, DELETE
			'callback' => [$this, 'get_posts']
		]);

	}

	/**
	 * Callback function for a REST API Route.
	 */
	public function get_posts( $request ){

		$response = [];

		$page = ( isset($request['page']) ) ? $request['page'] : null;
		$posts_per_page = ! empty( $request['posts_per_page']) ? $request['posts_per_page'] : 1;

		ob_start();

		$args = [
			'post_type' => '',
			'posts_per_page' => $posts_per_page,
			'paged' => $page,
			'no_found_rows' => true, // useful when pagination is not needed.
			'update_post_meta_cache' => false, // useful when post meta will not be utilized.
			'update_post_term_cache' => false, // useful when taxonomy terms will not be utilized.
			'fields' => 'ids', // useful when only the post IDs are needed (less typical).
		];

		$new_posts = new WP_Query( $args );
		if ( $new_posts->have_posts() ) :

			while ( $new_posts->have_posts() ) : $new_posts->the_post();

				$post_id = get_the_ID();
				$response[$post_id]['html'] = get_template_part( 'partials/content/content', 'post' );

			endwhile;
			wp_reset_postdata();

		endif;

		$response = ob_get_clean();

		$response = new WP_REST_Response($response);
		$response->set_status( 200 );
		return $response;
	}

}

/**
 * Initialize and register the routes with the REST API.
 */
add_action('rest_api_init', function () {
	if (class_exists('WPST_REST')) {
		$controller = new WPST_REST();
		$controller->register_routes();
	}
});