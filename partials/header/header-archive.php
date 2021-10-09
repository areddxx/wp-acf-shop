<?php
/**
 * Archive Header
 *
 * Generates the output for the archive header section of the archive.php file.
 *
 * @package WordPress
 * @since 1.0
 */

$header_title = get_the_archive_title();
$header_subtitle  = null;
?>

<section id="page-header" class="page-header page-header--archive">

	<div class="page-header__overlay"></div>

		<div class="container is-flex">

			<div class="page-header__content">

				<h1 class="page-header__title"><?php echo $header_title; ?></h1>

				<?php if ( ! empty( $header_subtitle ) ) : ?>
					<span class="page-header__subtitle"><?php echo $header_subtitle; ?></span>
				<?php endif; ?>


				<?php if ( function_exists('yoast_breadcrumb') ) : ?>
					<?php yoast_breadcrumb('<div class="page-header__breadcrumbs"><div class="container">','</div></div>'); ?>
				<?php endif; ?>

			</div><!-- .page-header__content -->

		</div>

</section><!-- END .page-header -->