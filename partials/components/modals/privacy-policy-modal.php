<?php
/**
 * Fancybox: Modal Template
 *
 * Usage:
 * <a gref="javascript:;" data-fancybox data-src="privacy-policy">Open</a>
 *
 * @package WordPress
 * @since 1.0
 */

$privacy_policy = get_option('options_privacy_policy');
?>

<?php if ( $privacy_policy ) : ?>

	<div style="display: none;" id="privacy-policy">
		<div class="container">
			<?php echo wpautop( $privacy_policy ); ?>
		</div>
	</div>

<?php endif; ?>