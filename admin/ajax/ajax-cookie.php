<?php
/**
 * Theme cookies
 * This method will set a cookie using ajax.
 */

/**
* Set a cookie
*/
function set_cookie_callback() {

	$result = [];
	$cookie_id = isset( $_REQUEST['cookie_id'] ) ? sanitize_text_field($_REQUEST['cookie_id']) : null;
	$cookie_value = isset( $_REQUEST['cookie_value'] ) ? sanitize_text_field($_REQUEST['cookie_value']) : null;
	$cookie_expiration = isset( $_REQUEST['cookie_expiration'] ) ? sanitize_text_field($_REQUEST['cookie_expiration']) : false;
	$cookie_expiration = current_time( 'timestamp' ) + (DAY_IN_SECONDS * $cookie_expiration);

	$result['cookie'] = [
		'id' => $cookie_id,
		'value' => $cookie_value,
		'expiration' => $cookie_expiration,
	];

	setcookie($cookie_id, $cookie_value, $cookie_expiration, COOKIEPATH, COOKIE_DOMAIN);

	wp_send_json($result);
	wp_die();
}
add_action( 'wp_ajax_set_cookie', 'set_cookie_callback' );
add_action( 'wp_ajax_nopriv_set_cookie', 'set_cookie_callback' );
