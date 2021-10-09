<?php
 /**
  * AJAX Comments
  */
function wpst_submit_ajax_comment(){

	$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );

	if ( is_wp_error( $comment ) ) {
		$error_data = intval( $comment->get_error_data() );
		if ( ! empty( $error_data ) ) {
			wp_die( '<p>' . $comment->get_error_message() . '</p>', __( 'Comment Submission Failure' ), array( 'response' => $error_data, 'back_link' => true ) );
		} else {
			wp_die( 'Unknown error' );
		}
	}

	/*
	 * Set Cookies
	 */
	$user = wp_get_current_user();
	do_action('set_comment_cookies', $comment, $user);

	/*
	 * If you do not like this loop, pass the comment depth from JavaScript code
	 */
	$comment_depth = 1;
	$comment_parent = $comment->comment_parent;
	while( $comment_parent ){
		$comment_depth++;
		$parent_comment = get_comment( $comment_parent );
		$comment_parent = $parent_comment->comment_parent;
	}

 	/*
 	 * Set the globals, so our comment functions below will work correctly
 	 */
	$GLOBALS['comment'] = $comment;
	$GLOBALS['comment_depth'] = $comment_depth;

	ob_start();

	/*
	 * Here is the comment template, you can configure it for your website
	 * or you can try to find a ready function in your theme files
	 */
	get_template_part( 'partials/post/post', 'comment' );

    $comment_html = ob_get_clean();
    echo $comment_html;

	die();

}
add_action( 'wp_ajax_ajaxcomments', 'wpst_submit_ajax_comment' ); // wp_ajax_{action} for registered user
add_action( 'wp_ajax_nopriv_ajaxcomments', 'wpst_submit_ajax_comment' ); // wp_ajax_nopriv_{action} for not registered users




/**
* Add/Remove Comment Likes
*/
function wpst_like_comment_func() {

	if ( ! wp_verify_nonce( wp_unslash( $_REQUEST['nonce'] ), 'comment-like' ) ) {
		exit( 'No naughty business please' );
	}

	$interaction 		= isset( $_REQUEST['interaction'] ) ? $_REQUEST['interaction'] : 0;
	$comment_id  		= isset( $_REQUEST['commentID'] ) ? intval( $_REQUEST['commentID'] ) : 0;

	$current_likes = get_comment_meta( $comment_id, 'likes', true );
	$current_likes = ( ! empty( $current_likes ) ) ? $current_likes : 0;

	$user_id 	= get_current_user_id();
	$user_likes = get_user_meta( $user_id, 'comment_likes', true );

	if ( ! $user_likes ) :
		$user_likes = [];
	endif;

	$new_likes['data'] = $user_likes;
	$new_likes['usesr'] = $user_id;

	if ( 'like' == $interaction && $comment_id) :
		update_comment_meta( $comment_id, 'likes', ($current_likes + 1), $current_likes );

		if ( ! in_array($comment_id, $user_likes) ) :
			$user_likes[] = $comment_id;
			update_user_meta( $user_id, 'comment_likes', $user_likes );
		endif;

	endif;

	if ( 'unlike' == $interaction && $comment_id) :

		if($current_likes > 0) :
			update_comment_meta( $comment_id, 'likes', ($current_likes - 1), $current_likes );
		endif;

		foreach (array_keys($user_likes, $comment_id, true) as $key) {
		    unset($user_likes[$key]);
		}
		update_user_meta( $user_id, 'comment_likes', $user_likes );

	endif;

	$new_likes['count'] = get_comment_meta( $comment_id, 'likes', true );
	$new_likes['interaction'] = $interaction;

	if ( ! empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) :

		$result = wp_json_encode( $new_likes );
		echo $result;

	else :

		header( 'Location: ' . $_SERVER["HTTP_REFERER"] );

	endif;

	wp_die();

}
add_action( 'wp_ajax_like_comment', 'wpst_like_comment_func' );
add_action( 'wp_ajax_nopriv_like_comment', 'wpst_like_comment_func' );