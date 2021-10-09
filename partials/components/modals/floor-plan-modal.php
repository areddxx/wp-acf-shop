<?php
/**
 * Floor Plans Card.
 */
$enable_sightmap = $args['sightmap'];

$image = get_field('image'); // Used for Entrata
// $image = get_field('image_url'); // Used for RentCafe
$bedrooms = get_field('bedrooms');
$bedrooms = ( $bedrooms == 0 ) ? 'Studio' : $bedrooms . ' BR';
$bathrooms = get_field('bathrooms');
$size_min = get_field('size_min');
$size_max = get_field('size_max');
$price_min = get_field('price_min');
$price_max = get_field('price_max');
$availability_url = get_field('availability_url');

// Create array of all floor plan categories
$floor_plan_categories = get_the_terms( $post->ID, 'floor_plan_category' );
$categories = array_map(function($category){
	return $category->name;
}, $floor_plan_categories);

/**
 * Floor plan unit data, remove what is unnecessary.
 * $unit_available_dates: Used for date filter.
 * $unit_names: Used for Engrain integration.
 */
$unit_available_dates = [];
$unit_names = [];
if( have_rows('floor_plan_units') ):
   	while ( have_rows('floor_plan_units') ) : the_row();

   		/**
   		 * Unit data for use in filters/sightmap.
   		 */
   		$name = get_sub_field('name');
   		$available_on = get_sub_field('available_on');
   		if ( $name ) $unit_names[] = $name;
   		if( $available_on ) $unit_available_dates[] = strtotime($available_on);

    endwhile;
endif;
$available_min = ( $unit_available_dates ) ? min($unit_available_dates) : null;
?>

<div id="floor-plan-<?php echo get_the_ID(); ?>" style="display:none;" class="floor-plan-modal">

	<div class="is-flex">

		<?php if ( $image ) : ?>
			<div class="floor-plan-card__image">
				<?php echo wp_get_attachment_image( $image, 'medium', false, []); ?>
			</div><!-- .floor-plan-card__image -->
		<?php else : ?>
			<div class="floor-plan-card__image is-placeholder"><span>Image Not Available</span></div><!-- .floor-plan-card__image -->
		<?php endif; ?>

		<div class="floor-plan-card__content">

			<h3 class="floor-plan-card__name"><?php the_title(); ?></h3>

			<ul class="floor-plan-card__details">
				<?php if ( $bedrooms ) : ?>
					<li class="floor-plan-card__bedrooms"><?php echo $bedrooms; ?></li>
				<?php endif; ?>
				<?php if ( $bathrooms ) : ?>
					<li class="floor-plan-card__bathrooms"><?php echo number_format($bathrooms); ?> BA</li>
				<?php endif; ?>
				<?php if ( $size_min ) : ?>
					<li class="floor-plan-card__size"><?php echo number_format($size_min); ?> SQ. FT.</li>
				<?php endif; ?>
				<?php if ( $price_min ) : ?>
					<li class="floor-plan-card__price">$<?php echo number_format($price_min); ?></li>
				<?php endif; ?>
			</ul><!-- .floor-plan-card__details -->

			<div class="floor-plan-card__button">
				<?php if ( $availability_url ) : ?>
					<a href="<?php echo $availability_url; ?>" target="_blank" class="button">Apply</a>
				<?php endif; ?>
				<?php if ( $unit_names && $enable_sightmap ) : ?>
					<button class="button tabs-nav-item" data-tab="sightmap" data-units='<?php echo json_encode($unit_names); ?>'>View Availability</button>
				<?php endif; ?>
			</div><!-- .floor-plan-card__button -->

		</div><!-- .floor-plan-card__content -->

	</div><!-- .is-flex -->

</div><!-- .floor-plan-modal -->