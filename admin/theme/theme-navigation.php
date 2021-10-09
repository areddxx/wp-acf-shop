<?php
/**
 * Theme Navigation
 *
 * Register the theme navigation areas.
 *
 * @package WordPress
 * @since 1.0
 */
register_nav_menus(array(
    'wpst-nav-main' => 'Main Navigation',
    'wpst-nav-top' 	=> 'Top Navigation',
));

/**
 * Add theme navigations
 */
if ( ! function_exists( 'wpst_main_menu' ) ) {
	function wpst_main_menu() {
	    wp_nav_menu(array(
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'main-nav',           			// adding custom nav class
	        'theme_location' => 'wpst-nav-main',             // where it's located in the theme
	        'before' => '',                                 // before each link <a>
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new wpst_mega_walker(),
	    ));
	}
}

if ( ! function_exists( 'wpst_top_menu' ) ) {
	function wpst_top_menu() {
	    wp_nav_menu(array(
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'top-nav',           			// adding custom nav class
	        'theme_location' => 'wpst-nav-top',             // where it's located in the theme
	        'before' => '',                                 // before each link <a>
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	    ));
	}
}

/**
 *  Search Menu Item.
 *
 * This function appends a Search menu option to wpst-nav-top navigation
 *
 * @package WordPress
 * @since 1.0
 */
function wpst_menu_search( $items, $args ) {

	if ( $args->theme_location == 'wpst-nav-top' ) :

		$items .= '<li class="menu-item menu-item--search">';
		$items .= '<a class="" href="#"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></a>';
		$items .= '</li>';

	endif;

   return $items;
}
// add_filter( 'wp_nav_menu_items', 'wpst_menu_search', 10, 2 );




/**
 * Modify the default navigations with
 * a Walker class.
 */
class wpst_mega_walker extends Walker_Nav_Menu {

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent = ( $depth ) ? str_repeat( '', $depth ) : '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

    	$object 		= $item->object;
    	$type 			= $item->type;
    	$title 			= $item->title;
    	$description 	= $item->description;
    	$icon 			= get_field('menu_item_icon', $item);
    	$extra_class = ( ! empty($icon) ) ? $item->classes[] = 'menu-item--has-icon' : null;


		$output .= '<li class="' .  implode(' ', $item->classes) .'">';
		$atts = array();
		$atts['title']  		= ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] 		= ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    		= ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   		= ! empty( $item->url )        ? $item->url        : '';
		// $atts['description']   	= ! empty( $item->description ) ? $item->description        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) :
		    if ( ! empty( $value ) ) :
		        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
		        $attributes .= ' ' . $attr . '="' . $value . '"';
		    endif;
		endforeach;


		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';

		if ( $icon ) :
			$item_output .= '<span class="menu-item__icon">' . wp_get_attachment_image( $icon['ID'], 'medium' ) . '</span>';
		endif;

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );

		if ( $description ) :
			$item_output .= '<span class="menu-item__description">' . $description . '</span>';
		endif;

		$item_output .= $args->link_after;

		if ( in_array( 'menu-item-has-children', $classes ) && 0 == $depth ) :
			$item_output .= '<span><img class="is-svg" src="' . THEME_URL . '/assets/img/icon-submenu.svg"></span>';
		endif;

		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

}


/**
 * Adds support for Fancybox to a menu item.
 */
function menu_item_fancybox( $atts, $item, $args ) {

	$modal = get_field('menu_item_modal', $item);

	// inspect $item
	if( $modal ) :
		$atts['href'] = 'javascript:;';
		$atts['data-fancybox'] = $modal;
		$atts['data-src'] = '#' . $modal;
	endif;

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'menu_item_fancybox', 10, 3 );