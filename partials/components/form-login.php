<?php
/**
 * WP Login Form
 *
 * This file outputs the login form to which
 * ever page it is included on and redirects to
 * that page.
 */
?>

<div class="login-form">

	<?php
	/**
	 * Login Form.
	 */
	$redirect = is_page( 'login' ) ? home_url() : get_the_permalink();
	wp_login_form([
		'echo'			=> true,
		'remember'		=> false,
		'redirect'		=> $redirect,
		'form_id'		=> 'login-form',
	]);
	?>

	<div class="login-form__forgot-password">
		<a href="<?php echo wp_lostpassword_url(); ?>">Forgot Password?</a>
	</div>

	<div class="login-form__sign-up">Don't have an account? <a href="/sign-up/">Sign Up Here</a></div>

</div> <!-- .login-form -->