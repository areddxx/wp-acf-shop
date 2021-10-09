<?php
/**
 * Single Post Content Template.
 *
 * Populates the single.php templte for "Post (post type)"
 *
 * @package WordPress
 * @since 1.0
 */
?>

<div class="container">

	<?php
	/**
	 * Sidebar check.
	 */
	$sidebar = true;
	$post_class = ( $sidebar ) ? 'has-sidebar' : null;
	?>

	<div class="content-area <?php echo $post_class; ?>">

		<article class="post is-flex">

			<?php
			/**
			 * Post sharing links
			 */
			get_template_part( 'partials/post/post', 'share' );
			?>

			<div class="post__body">

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post__image">
						<?php the_post_thumbnail( 'large' ); ?>
					</div><!-- .post__iamge -->
				<?php endif; ?>

				<?php get_template_part( 'partials/post/post', 'meta' ); ?>

				<h1 class="post__title"><?php the_title(); ?></h1>

				<div class="post__content">
					<?php the_content(); ?>
				</div>

			</div><!-- .post__body -->

		</article><!-- .post -->

		<?php
		/**
		 * If comments are open or we have at least one comment,
		 * load up the comment template.
		 */
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	</div><!-- .content-area -->

	<?php
	/**
	 * Post Sidebar
	 */
	?>
	<?php if ( $sidebar ) : ?>

		<div class="sidebar sidebar--post">
			<?php dynamic_sidebar('post-sidebar'); ?>
		</div><!-- .sidebar -->

	<?php endif; ?>

</div><!-- .container -->