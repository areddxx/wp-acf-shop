<?php
/**
 *	Default file, used for
 *	blog / archive layouts.
 *
 *	@package WordPress
 *	@since 1.0
 */

get_header();
?>

<main id="main" role="main" class="page-wrap">

	<?php if ( have_posts() ) : ?>

		<?php //get_template_part( 'partials/header/header', 'index' ); ?>

		<div class="container">

			<div class="content-area is-flex">

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'partials/content/content', 'index' ); ?>
					<?php endwhile; ?>

					<div class="pagination">
						<?php show_pagination(); ?>
					</div><!-- .pagination -->

			</div><!-- .content-area -->

			<div class="sidebar">
				<?php dynamic_sidebar( 'blog-sidebar' ); ?>
			</div><!-- .sidebar -->

		</div>

	<?php endif; ?>

</main><!-- .page-wrap -->

<?php get_footer(); ?>