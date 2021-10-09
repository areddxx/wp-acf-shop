<?php
/**
 * Hero Carousel Item: Carousel Item (Standard).
 *
 * This file contains the markup for the standard carousel item.
 *
 * @package WordPress
 * @since 1.0
 */

/**
 * Carousel item data
 */
$title 	= get_sub_field('title');
$text 	= get_sub_field('text');
$image 	= get_sub_field('image');
$background = ( $image ) ? 'style="background-image: url(' . $image['url'] . ');"' : null;
?>

<div class="hero-item carousel__slide" <?php echo $background; ?>>

	<div class="hero-item__overlay"></div>

	<div class="container is-flex">

		<div class="hero-item__content">

			<?php if ( $title ) : ?>
				<h1 class="hero-item__title"><?php echo $title; ?></h1>
			<?php endif; ?>

			<?php if ( $text ) : ?>
				<div class="hero-item__description">
					<?php echo wpautop( $text ); ?>
				</div>
			<?php endif; ?>

			<?php if( have_rows('buttons') ): ?>

				<div class="hero-item__buttons">

				    <?php while ( have_rows('buttons') ) : the_row(); ?>

			            <?php
				        /**
				         * Button Variables
				         */
				        $link = get_sub_field( 'button' );
				        ?>

				        <?php if ( isset( $link['url'] ) ) : ?>
				        	<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
				        <?php endif; ?>

				    <?php endwhile; ?>

				</div><!-- .hero-item__buttons -->

			<?php endif; ?>

		</div><!-- .hero-item__content -->

	</div><!-- .container -->

</div><!-- .hero-item -->
