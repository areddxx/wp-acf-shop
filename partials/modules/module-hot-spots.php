<?php
/**
 * Module: Hot Spots
 */

// Load Google and Hot Spot scripts.
wp_enqueue_script( 'goolge-maps', 'https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_API_KEY , array(), '', true );
wp_enqueue_script( 'snazzy-info-window', THEME_URL . '/assets/js/components/snazzy-info-window.min.js', array(), '', true );
wp_enqueue_script( 'hot-spots', THEME_URL . '/assets/js/modules/hot-spots.js', array('jquery'), '', true );

// Section ID and Classes
$id = get_sub_field('section_id');
$class = get_sub_field('section_class');
$section_id = ($id) ? $id : null;
$section_class = ($class) ? $class : null;
?>

<section id="<?php echo $section_id; ?>" class="hot-spots is-flex <?php echo $section_class; ?>">

	<div class="hot-spots__filters">

		<?php
		/**
		 * Hotspot Category Filters
		 */
		$hot_spot_categories = get_terms(['taxonomy' => 'hot_spot_category']);
		?>

		<?php foreach ( $hot_spot_categories as $category ) : ?>

			<?php
			/**
			 * If the design does not require the hot spot
			 * posts to be listed beneath the hot spot category then this
			 * WP_Query instance can be removed leaving just the hot spot category names.
			 */
			$hot_spot_posts = new WP_Query([
				'post_type' => 'hot_spot',
				'posts_per_page' => '500',
				'no_found_rows' => true,
				'tax_query' => [
					[
						'taxonomy' => 'hot_spot_category',
						'field' => 'slug',
						'terms' => [$category->slug],
					]
				]
			]); ?>

			<ul class="hot-spots__category-group">
				<li>
					<button class="hot-spots__category-name" data-category-slug="<?php echo $category->slug; ?>"><span><?php echo $category->name; ?></span></button>
					<?php if ( $hot_spot_posts->have_posts() ) : ?>
						<ul class="hot-spot__category-posts">
							<?php while ( $hot_spot_posts->have_posts() ) : $hot_spot_posts->the_post(); ?>
								<li data-id="<?php echo get_the_ID(); ?>"><?php the_title(); ?></li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</li>
			</ul>

		<?php endforeach; ?>

	</div><!-- .hot-spots__filters -->

	<div class="hot-spots__map">
		<div id="hot-spots-map">

			<?php $hot_spot_posts = new WP_Query([
				'post_type' => 'hot_spot',
				'posts_per_page' => '500',
				'no_found_rows' => true,
			]); ?>

			<?php if ( $hot_spot_posts->have_posts() ) : ?>

				<?php while ( $hot_spot_posts->have_posts() ) : $hot_spot_posts->the_post(); ?>

					<?php
					/**
					 * Hot Spot data
					 */
					$location = get_field( 'location' );
					if ( ! $location ) continue;

					$marker_file = get_field( 'marker_file' );
					$website = get_field( 'website' );
					$address = get_field( 'address' );
					$address = ( $address ) ? $address : $location['address'];

					// Marker array for data-attribute.
					$marker = [
						'id' => get_the_ID(),
						'lat' => $location['lat'],
						'lng' => $location['lng'],
					];

					// Get marker image file data for a custom marker image.
					if( $marker_file ) :
						$marker['image'] = [
							'url' => $marker_file['url'],
							'width' => $marker_file['width'],
							'height' => $marker_file['height'],
						];
					endif;

					// Hot Spot categories
					$marker['categories'] = [];
					$hot_spot_categories = get_the_terms($post, 'hot_spot_category');
					if( $hot_spot_categories && ! is_wp_error( $hot_spot_categories ) ) :
						$marker['categories'] = array_map(function($category){
							return $category->slug;
						}, $hot_spot_categories);
					endif;
					?>

					<div class="marker" data-marker='<?php echo json_encode($marker); ?>'>
						<h4 class="marker__title"><?php the_title(); ?></h4>
						<p class="marker__address"><a href="https://www.google.com/maps/place/<?php echo urlencode($location['address']); ?>" target="_blank"><?php echo $address; ?></a></p>
						<a class="marker__directions button" href="https://www.google.com/maps/place/<?php echo urlencode($location['address']); ?>" target="_blank">Get Directions</a>
						<?php if ( $website ) : ?>
							<a class="marker__website button" href="<?php echo $website; ?>" target="_blank">View Website</a>
						<?php endif; ?>
					</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div><!-- #hot-spots-map -->
	</div><!-- .hot-spots__map -->

</section><!-- .hot-spots -->