<?php
/**
 * Notifications: Sticky Bar Bottom
 * Displays sticky bar notifications below the footer.
 */
$cookie_value = isset($_COOKIE['notification_bottom']) ? $_COOKIE['notification_bottom'] : false;
?>

<?php if ( ! $cookie_value ) : ?>

	<?php
	/**
	 * Notification Data.
	 */
	$message = get_field('notification_bottom_message', 'option');
	$cookie_duration = get_field('notification_bottom_cookie_duration', 'option');
	?>

	<?php if ( ! empty( $message ) ) : ?>

		<div class="notification is-hidden is-bottom" data-notification="notification_bottom" data-value="<?php echo $cookie_duration; ?>" data-expiration="<?php echo $cookie_duration; ?>">

			<div class="container is-flex">

				<h3 class="notification__title">
					<span><?php echo $message; ?></span>
				</h3><!-- .notification__title -->

			</div><!-- .container -->

			<button href="#" class="notification__close">
				<svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
			</button>

		</div><!-- .notification -->

	<?php endif; ?>

<?php endif; ?>