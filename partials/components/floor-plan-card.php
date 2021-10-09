<?php
/**
 * Floor Plans Card.
 */

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

// Create array of all floor plan category slugs
$categories = [];
$floor_plan_categories = get_the_terms( $post->ID, 'floor_plan_category' );
if( $floor_plan_categories && ! is_wp_error( $floor_plan_categories ) ) :
	$categories = array_map(function($category){
		return $category->slug;
	}, $floor_plan_categories);
endif;
?>

<div class="floor-plan-card is-active" data-categories='<?php echo json_encode($categories); ?>'>

	<?php if ( $image ) : ?>
		<div class="floor-plan-card__image" data-fancybox data-src="#floor-plan-<?php echo $post->ID; ?>">
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

			<a href="<?php the_permalink(); ?>" target="_blank" class="button">View Availability</a>

		</div><!-- .floor-plan-card__button -->

	</div><!-- .floor-plan-card__content -->

</div><!-- .floor-plan-card -->