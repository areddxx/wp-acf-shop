<?php
/**
 * Page Header: Search
 *
 * Generates the output for the header section of the search template.
 *
 * @package WordPress
 * @since 1.0
 */

$page_title = get_search_query();
?>

<section class="page-header">

	<div class="page-header__overlay"></div>

	<div class="container is-flex">

		<div class="page-header__content">

			<h1 class="page-header__title">Results for: <?php echo $page_title; ?></h1>

		</div><!-- .page-header__content -->

	</div><!-- .container -->

</section><!-- .page-header -->
