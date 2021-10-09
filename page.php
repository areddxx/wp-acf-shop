<?php
/**
 *	Default page template
 *
 *	Generates the output for the
 *	pages using the default tempalte
 *
 *  @package WordPress
 *  @since 1.0
 */

get_header();

if ( have_posts() ) : ?>

<main id="main" role="main" class="page-wrap">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		/**
		 * Optionally use page modules.
		 */
		$enable_modules = get_post_meta( $post->ID, 'enable_modules', true );
		?>

		<?php if ( $enable_modules ) : ?>

			<?php
			/**
			 * Page Modules.
			 */
			get_template_part( 'partials/modules/modules' );
			?>

		<?php else : ?>

			<div class="content-area">

				<div class="container">

					<?php the_content(); ?>

				</div><!-- .container -->

			</div><!-- .content-area -->

		<?php endif; ?>

	<?php endwhile; ?>

</main> <!-- .page-wrap -->

<?php endif; ?>
<?php get_footer(); ?>
