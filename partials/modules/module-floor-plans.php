<?php
/**
 * Module: Floor Plans
 */

// Section ID and Classes
$id = get_sub_field('section_id');
$class = get_sub_field('section_class');
$section_id = ($id) ? $id : null;
$section_class = ($class) ? $class : null;

// Section Data
$enable_engrain_sightmap = get_sub_field('enable_engrain_sightmap');
$engrain_sightmap = get_sub_field('engrain_sightmap');
$enable_filters = get_sub_field('enable_filters');
$enable_sightmap = ( $enable_engrain_sightmap && $engrain_sightmap ) ? true : false;
?>

<section id="<?php echo $section_id; ?>" class="floor-plans <?php echo $section_class; ?>">

	<div class="container">

		<?php if ( $enable_sightmap ) : ?>
			<ul class="floor-plans__tab-nav is-flex">
				<li><button class="button button--white tabs-nav-item is-active" data-tab="floor-plans">Floor Plans</button></li>
				<li><button class="button button--white tabs-nav-item" data-tab="sightmap">Interactive Building Map</button></li>
			</ul>
		<?php endif; ?>

		<div class="tabs-content-item is-active" data-tab="floor-plans">

			<?php
			/**
			 * Floor Plan categories nav.
			 */
			$floor_plan_categories = get_terms([
			    'taxonomy' => 'floor_plan_category',
			    'order' => 'ASC',
			    'orderby' => 'slug'
			]);
			?>

			<?php if ( $floor_plan_categories && ! is_wp_error($floor_plan_categories) ) : ?>

				<ul class="floor-plan__categories is-flex">
					<li class="floor-plans__selected show-tablet-down"><span class="">Bedrooms</span></li>
					<li><button class="floor-plans__category button is-active" data-category-name="all">All</button></li>
					<?php foreach ($floor_plan_categories as $category) : ?>
						<li><button class="floor-plans__category button" data-category-name="<?php echo $category->slug; ?>"><?php echo $category->name; ?></button></li>
					<?php endforeach; ?>
				</ul>

			<?php endif; ?>

			<?php
			/**
			 * Floor Plan Filters
			 */
			if ( $enable_filters ) :
				get_template_part( 'partials/components/floor-plan', 'filters' );
			endif;
			?>

			<?php
			/**
			 * Floor Plan Cards/Modals
			 * Remove the modal partial if it
			 * is not called for in the design.
			 */
			$floor_plan_posts = new WP_Query([
			    'post_type' => 'floor_plan',
			    'posts_per_page' => '100',
			    'no_found_rows' => true,
			    'orderby' => 'meta_value',
			    'meta_key' => 'bedrooms',
			    'order' => 'ASC'
			]);
			?>

			<?php if ( $floor_plan_posts->have_posts() ) : ?>

				<div class="floor-plans__list is-flex">

					<?php while ( $floor_plan_posts->have_posts() ) : $floor_plan_posts->the_post(); ?>
						<?php get_template_part( 'partials/components/floor-plan', 'card' ); ?>
						<?php // get_template_part( 'partials/components/floor-plan', 'card-units', ['sightmap' => $enable_sightmap] ); ?>
						<?php get_template_part( 'partials/components/modals/floor-plan', 'modal', ['sightmap' => $enable_sightmap] ); ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

				</div><!-- .floor-plans__list -->

			<?php endif; ?>

		</div><!-- .tabs-content-item -->

		<?php if ( $enable_sightmap ) : ?>
			<div class="tabs-content-item" data-tab="sightmap">
				<div class="embed-container is-sightmap">
					<?php echo $engrain_sightmap; ?>
				</div>
			</div><!-- .tabs-content-item -->
		<?php endif; ?>

	</div><!-- .container -->

</section><!-- .floor-plans -->