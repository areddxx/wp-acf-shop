<?php
/**
 *	Single post template
 *
 *	Populates the content for a single post
 *
 *	@package WordPress
 *	@since 1.0
 */

get_header();

if ( have_posts() ) : ?>

<main id="main" role="main" class="page-wrap">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		/**
		 * Get the Content for the single post type.
		 */
		get_template_part( 'partials/content/content', get_post_type() );
		?>

	<?php endwhile; ?>

</main><!-- .page-wrap -->

<?php endif; ?>
<?php get_footer(); ?>
