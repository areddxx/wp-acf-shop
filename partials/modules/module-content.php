<?php
/**
 * Module: Content
 */

// Section ID and Classes
$id 			= get_sub_field('section_id');
$class 			= get_sub_field('section_class');
$section_id 	= ($id) ? $id : null;
$section_class 	= ($class) ? $class : null;

// Section Data
$content = get_sub_field('content');
?>

<section id="<?php echo $section_id; ?>" class="content-area <?php echo $section_class; ?>">

	<div class="container">
		<?php echo do_shortcode( wpautop( $content ) ); ?>
	</div>

</section><!-- .content-area -->