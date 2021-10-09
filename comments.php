<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<div class="container is-flex">

		<?php if ( ! have_comments() ) : ?>
			<h2 class="comments__title">
				<?php printf( _x( 'Comments <span>(0)</span>', 'comments title', 'wpst' ) ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( have_comments() ) : ?>

			<h2 class="comments__title">
				<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'Comments <span class="font-red">(1)</span>', 'comments title', 'wpst' ) );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'Comments <span class="font-red">(%1$s)</span>',
							'Comments <span class="font-red">(%1$s)</span>',
							$comments_number,
							'comments title',
							'wpst'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
				?>
			</h2>

			<ul class="comments__list is-flex">
				<?php
					wp_list_comments( array(
						'avatar_size' => 50,
						'style'       => 'ul',
						'short_ping'  => true,
						'format' => current_theme_supports( 'html5', 'comment__list' ) ? 'html5' : 'xhtml',
						'callback' => 'wpst_format_comment'
					) );
				?>
			</ul>

			<?php the_comments_pagination( array(
				// 'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous', 'wpst' ) . '</span>',
				// 'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
			) );

		endif; // Check for have_comments().

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'wpst' ); ?></p>
		<?php
		endif;


		/**
		 * Comment Form Options
		 */
			/**
			 * Comment Form Options
			 */
			$comment_count = get_comment_count( get_the_ID() );
			$comment_count = $comment_count['approved'];
			$new_defaults = array(
				'id_form'           => 'commentform',
				'class_form'      	=> 'comments__form',
				'id_submit'         => 'submit',
				'class_submit'      => 'submit',
				'name_submit'       => 'submit',
				'title_reply'       => __( '' ),
				'title_reply_to'    => __( 'Leave a Reply to %s' ),
				'cancel_reply_link' => __( 'Cancel Reply' ),
				'label_submit'      => __( 'Publish' ),
				'format'            => 'xhtml',

				'comment_field' =>  '<p class="comment-form-comment">' .
				'<textarea id="comment" name="comment" cols="45" rows="8" placeholder="Write a comment" aria-required="true">' .
				'</textarea></p>',

				'must_log_in' => '<p class="must-log-in">' .
				sprintf(
				  __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
				  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</p>',

				// 'logged_in_as' => '<p class="logged-in-as">' .
				// sprintf(
				// __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
				//   admin_url( 'profile.php' ),
				//   $user_identity,
				//   wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
				// ) . '</p>',

				'logged_in_as' => '',

				$fields =  array(
				    'name' => '<div class="input-name"><input id="author" type="text" name="author" placeholder="Enter your name" /></div>',
				    'email' => '<div class="input-email"><input id="email" type="text" name="email" placeholder="Enter your email address" /></div>',
				),

				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'fields' => apply_filters( 'comment_form_default_fields', $fields ),
				// 'fields' => $fields,
			);
			comment_form($new_defaults);
		?>

	</div><!-- .container -->

</div><!-- #comments -->
