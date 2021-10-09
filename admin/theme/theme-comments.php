<?php
/**
 * Comment Template
 *
 * Changes the HTML of a comment
 *
 * @package WordPress
 * @since 1.0
 */
function wpst_format_comment($comment, $args, $depth) {
	include( locate_template( '/partials/post/post-comment.php' ) );
}