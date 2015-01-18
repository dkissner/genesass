<?php

/**
 * This function will help cause the secondary menu to act as a
 * sticky menu at the top of the screen while the user scrolls down
 *
 * It will queue up js/sticky-menu.js jquery script
 * 
 * And update the Genesis after header hook.
 *
 * NOTE: you'll also have to make sure the style.scss sheet does:
 *
 *   @import 'sticky-menu'
 * 
 * Last you'll have to make sure you have created a secondary menu!
 */
function gs_do_secondary_sticky_menu()
{
    //* Enqueue sticky menu script
	add_action( 'wp_enqueue_scripts', 'sp_enqueue_script' );
    function sp_enqueue_script() {
    	wp_enqueue_script( 'sample-sticky-menu',
    		get_bloginfo( 'stylesheet_directory' ) . '/js/sticky-menu.js',
    		array( 'jquery' ), '1.0.0' );
    }

    //* Reposition the secondary navigation menu
    remove_action( 'genesis_after_header', 'genesis_do_subnav' );
    add_action( 'genesis_before', 'genesis_do_subnav' );
}
