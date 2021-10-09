<?php
/**
 * Social Links.
 *
 * Displays the social links/icons populated in the theme settings.
 *
 * @package WordPress
 * @since 1.0
 */

$facebook 		= get_option( 'options_facebook' );
$twitter 		= get_option( 'options_twitter' );
$instagram 		= get_option( 'options_instagram' );
$linkedin 		= get_option( 'options_linkedin' );
$youtube 		= get_option( 'options_youtube' );

$socials = [
	'facebook' 	=> ['link' => $facebook, 'name' => 'Facebook', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>'],
	'twitter' 	=> ['link' => $twitter, 'name' => 'Twitter', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>'],
	'instagram' => ['link' => $instagram, 'name' => 'Instagram', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>'],
	'linkedin' 	=> ['link' => $linkedin, 'name' => 'LinkedIn', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>'],
	'youtube' 	=> ['link' => $youtube, 'name' => 'YouTube', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>'],
];

$show_names = ( $args['atts']['show_usernames'] == 'true' ) ? true : false;
$social_links_class = ( $show_names ) ? ' social-links--show-names' : null;
?>

<ul class="social-links<?php echo $social_links_class; ?> is-flex">

	<?php foreach ( $socials as $key => $value ) : ?>

		<?php if ( ! empty( $value['link'] ) ) : ?>

			<li class="social-link">
				<a href="<?php echo $value['link']; ?>" target="_blank">
					<?php echo $value['icon']; ?>
					<?php if ( $show_names ) : ?>
						<span class="social-link__name"><?php echo $value['name']; ?></span>
					<?php endif; ?>
				</a>
			</li>

		<?php endif; ?>

	<?php endforeach; ?>

</ul><!-- .social-links -->