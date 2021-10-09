<?php
/**
 * Post Meta Information
 *
 * Shows additional post information.
 *
 * @package WordPress
 * @since 1.0
 */

global $post;
$author_id = $post->post_author;
$author_name = get_the_author_meta( 'display_name', $author_id  );
// $author_photo = get_the_author_meta( 'user_image', $author_id  ); // custom field
$author_posts_link = get_author_posts_url( $author_id, $author_name );
$post_categories = get_the_category();
$post_categories_links = array_map(function($post_category){
	return '<a href="' . get_category_link( $post_category->term_id ) . '">' . $post_category->name . '</a>';
}, $post_categories);
?>

<div class="post__meta is-flex">
	<div class="post__author">By <a href="<?php echo $author_posts_link; ?>"><?php echo $author_name; ?></a></div>
	<?php if ( $post_categories_links ) : ?>
		<div class="post__category"> in
			<?php echo implode(', ', $post_categories_links); ?>
		</div>
	<?php endif; ?>
	<div class="post__date"> on <?php echo get_the_date( 'M j, Y' ); ?></div>
</div>