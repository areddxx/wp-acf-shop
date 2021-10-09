<?php

/**
 * Get the search overlay.
 */
// get_template_part( 'partials/navigation/navigation', 'search' );
?>

<header role="banner" class="header">

	<?php
	/**
	 * Notifications (Top).
	 */
	get_template_part('partials/components/notifications/notifications-bar', 'top');
	?>

	<?php if (has_nav_menu('wpst-nav-top')) : ?>

		<div class="header__top">
			<div class="container is-flex">
				<?php wpst_top_menu(); ?>
			</div>
		</div>

	<?php endif; ?>

	<?php if (has_nav_menu('wpst-nav-main')) : ?>

		<div class="header__bottom">

			<div class="container is-flex">

				<?php $logo_id = get_option('options_logo'); ?>

				<?php if (!empty($logo_id)) : ?>
					<div itemscope itemtype="https://schema.org/Organization" class="header__logo">
						<a itemprop="url" href="<?php echo esc_url(home_url()); ?>">
							<?php echo wp_get_attachment_image($logo_id, 'large', false, array('alt' => get_bloginfo('name') . ' Logo', 'itemprop' => 'logo')); ?>
						</a>
					</div>
				<?php endif; ?>


				<nav role="navigation" class="header__menu header__menu--bottom">
					<?php wpst_main_menu(); ?>

					<button class="menu-icon" type="button">
						<span>Menu</span>
					</button>

				</nav><!-- .header__menu -->

			</div>

		</div>

	<?php endif; ?>

</header><!-- .header -->