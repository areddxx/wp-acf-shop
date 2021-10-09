<?php
/**
 * Modules
 *
 * Loops through the ACF modules.
 *
 * @package WordPress
 * @since 1.0
 */
if( have_rows('modules') ):

    while ( have_rows('modules') ) : the_row();
		include( locate_template('/partials/modules/module-' . get_row_layout() . '.php') );
    endwhile;

endif;