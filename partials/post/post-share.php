<?php
/**
 * Sharing Buttons
 *
 * Displays sharing buttons
 *
 * @package WordPress
 * @since 1.0
 */

global $post;

$permalink 	= get_the_permalink();
$title 		= get_the_title();
$thumbnail 	= get_the_post_thumbnail_url( $post->ID );

$icons = [
	'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>',
	'twitter' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>',
	'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>',
];

?>

<div class="post__share is-flex">
	<a class="post__share-link facebook" target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $permalink ); ?>"><?php echo $icons['facebook']; ?></a>
	<a class="post__share-link twitter" target="_blank" rel="noopener" href="https://twitter.com/home?status=<?php echo esc_url( $permalink ); ?>"><?php echo $icons['twitter']; ?></a>
	<a class="post__share-link linkedin" target="_blank" rel="noopener" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( $permalink ); ?>&title=<?php echo $title; ?>&summary=&source="><?php echo $icons['linkedin']; ?></a>
</div>