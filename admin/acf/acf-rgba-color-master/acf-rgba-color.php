<?php
// 1. set text domain
// Reference: https://codex.wordpress.org/Function_Reference/load_plugin_textdomain
// load_plugin_textdomain( 'advanced-custom-fields-rgba-color', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 




// 2. Include field type for ACF5
// $version = 5 and can be ignored until ACF6 exists
function include_field_types_rgba_color( $version ) {
	
	include_once('acf-rgba-color-v5.php');
	
}

add_action('acf/include_field_types', 'include_field_types_rgba_color');	


add_action('acf/register_fields', 'register_fields_rgba_color');	
?>