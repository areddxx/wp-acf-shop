<?php
/**
 * Index Header.
 *
 * Generates the output for the header section of the index.php file.
 *
 * @package WordPress
 * @since 1.0
 */
?>
<section class="page-header">

	<div class="page-header__overlay"></div>

	<div class="container is-flex">

		<div class="page-header__content">

			<h1 class="page-header__title"><?php the_title(); ?></h1>

		</div><!-- .page-header__content -->

	</div><!-- .container -->

</section><!-- .page-header -->