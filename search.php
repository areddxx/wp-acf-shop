<?php
/**
 *	Default file, used for
 *	search results.
 *
 *	@package WordPress
 *	@since 1.0
 */

get_header(); ?>

<div class="page-wrap">

<?php get_template_part( 'partials/header/header', 'search' ); ?>

<?php if ( have_posts() ) : ?>

	<div class="container">

		<div class="content-area is-flex">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'partials/content/content', 'search-results' ); ?>
			<?php endwhile; ?>

			<div class="pagination">
				<?php show_pagination(); ?>
			</div><!-- .pagination -->

		</div><!-- .content-area -->

		<div class="sidebar">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
		</div><!-- .sidebar -->

	</div><!-- .container -->

<?php else : ?>

	<div class="container">

		<div class="content-area">

			<h2>Sorry, we couldn't find any results for: <?php echo get_search_query(); ?></h2>

		</div>

	</div>

<?php endif; ?>

</div><!-- END .page-wrap -->
<?php get_footer(); ?>
