<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo THEME_URL; ?>/assets/img/icons/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo THEME_URL; ?>/assets/img/icons/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo THEME_URL; ?>/assets/img/icons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo THEME_URL; ?>/assets/img/icons/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo THEME_URL; ?>/assets/img/icons/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo THEME_URL; ?>/assets/img/icons/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php echo THEME_URL; ?>/assets/img/icons/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php echo THEME_URL; ?>/assets/img/icons/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?php echo THEME_URL; ?>/assets/img/icons/favicon-196x196.png" sizes="196x196" />
	<meta name="application-name" content="<?php echo get_bloginfo('name'); ?>"/>
	<meta name="msapplication-TileColor" content="#FFFFFF" />
	<meta name="msapplication-TileImage" content="<?php echo THEME_URL; ?>/assets/img/icons/mstile-144x144.png" />
	<?php wp_head(); ?>

	<?php
	/**
	 * Header Scripts.
	 * Put your header scripts in the file below and they
	 * will be included in this location in the <head>.
	 */
	get_template_part( 'partials/scripts/scripts', 'header' );
	?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php get_template_part( 'partials/scripts/scripts', 'body' ); ?>

<?php get_template_part( 'partials/navigation/navigation', 'menu' ); ?>
