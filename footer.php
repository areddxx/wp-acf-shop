<?php

/**
 * Footer
 *
 * This file generates the footer output
 *
 * @package WordPress
 * @since 1.0
 */
$sidebars 		= ['footer-one', 'footer-two', 'footer-three', 'footer-four'];
$sidebar_count 	= 0;

foreach ($sidebars as $sidebar) :
	if (is_active_sidebar($sidebar)) :
		$sidebar_count++;
	endif;
endforeach;

?>

<?php
/**
 * Cart
 */
//$card_layout = ( in_array($i, $wide_posts) ) ? 'wide' : 'standard';
?>

<?php get_template_part('partials/components/shop', 'cart'); ?>

<footer role="contentinfo" class="footer footer--<?php echo $sidebar_count; ?>-columns">

	<div class="footer__top">
		<div class="container is-flex">

			<?php $widget_map = ['one', 'two', 'three', 'four']; ?>
			<?php foreach ($sidebars as $i => $sidebar) : ?>
				<?php if (is_active_sidebar($sidebar)) : ?>

					<div class="footer__column footer__column--<?php echo $widget_map[$i]; ?>">
						<div class="inner">
							<?php dynamic_sidebar($sidebar); ?>
						</div>
					</div>

				<?php endif; ?>
			<?php endforeach; ?>

		</div><!-- .container -->
	</div> <!-- .footer__top -->

	<?php if (is_active_sidebar('footer-bottom')) : ?>

		<div class="footer__bottom">
			<div class="container is-flex">
				<?php dynamic_sidebar('footer-bottom'); ?>
			</div><!-- .container -->
		</div><!-- .footer__bottom -->

	<?php endif; ?>

	<?php
	/**
	 * Notifications (Bottom).
	 */
	get_template_part('partials/components/notifications/notifications-bar', 'bottom');
	?>

	<?php
	/**
	 * Modals.
	 */
	get_template_part('partials/components/modals/privacy-policy', 'modal');
	?>

</footer>

<?php wp_footer(); ?>
<?php get_template_part('partials/scripts/scripts', 'footer'); ?>

</body>

</html>