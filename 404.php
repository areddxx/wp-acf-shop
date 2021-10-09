<?php
/**
 *	404 page template
 *
 *	Generates the output for the
 *	404 page.
 *
 *  @package WordPress
 *  @since 1.0
 */

get_header();
?>

<main id="main" role="main" class="page-wrap">

	<div class="content-area is-flex">

		<div class="container is-flex">
			<h2 class="title">That's Awkward</h2>
			<p>The page you're searching for does not exist.</p>
			<a href="#" class="button" onclick="history.back(-1)">Go Back</a>
		</div>

	</div><!-- .content-area -->

</main> <!-- .page-wrap -->

<?php get_footer(); ?>
