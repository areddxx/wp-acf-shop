<?php
/**
 * Index Content Template.
 *
 * Populates the index.phpphp templte.
 *
 * @package WordPress
 * @since 1.0
 */
?>
<article class="post is-flex">

	<div class="post__body">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post__image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a>
			</div><!-- .post__image -->
		<?php endif; ?>

		<?php get_template_part( 'partials/post/post', 'meta' ); ?>

		<h1 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		<div class="post__content">
			<?php the_excerpt(); ?>
		</div>

	</div><!-- .post__article -->

</article><!-- .post -->