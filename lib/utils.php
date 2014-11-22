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

/**
 * Load up font-awesome
 * -----------------------------------------------------------------------------
 */
function gs_load_font_awesome()
{
   	//* Make Font Awesome available
	add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
    function enqueue_font_awesome() {
        wp_enqueue_style( 'font-awesome',
          '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css' );
    }
}

/**
 * Load up some Google Fonts
 */
function gs_load_google_fonts( $label, $family )
{
    $familystr = "//fonts.googleapis.com/css?family=" . $family;
    wp_enqueue_style( $label, $familystr, array(), CHILD_THEME_VERSION );
}

/**
 * Load Bootstrap in it's entirety
 */
function gs_load_bootstrap()
{
    function enqueue_bootstrap_css() {
        wp_enqueue_style( 'bootstrap',
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' );

        wp_enqueue_style( 'bootstrap-theme',
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css' );
    }

    function enqueue_bootstrap_js()
    {
        wp_enqueue_script ('bootstrap-js', 
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'
            );
    }

    //* Make Font Awesome available
    add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap_css' );
    add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap_js' );
}

/**
 * Move primary navbar above header
 * -----------------------------------------------------------------------------
 */
function gs_primary_navbar_above_header()
{
   	//* Reposition the primary navigation menu
    remove_action( 'genesis_after_header', 'genesis_do_nav' );
    add_action( 'genesis_before_header', 'genesis_do_nav' );
}

/**
 * Replace the genesis loop with our own custom loop
 *
 * TODO: Understand the genesis custom loop and why or when we may want
 * to use that.
 * -----------------------------------------------------------------------------
 */
function gs_replace_genesis_loop( $new_loop_function )
{
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_action( 'genesis_loop', $new_loop_function );
}

/**
 * Force full width layout
 * -----------------------------------------------------------------------------
 */
function gs_full_width_layout()
{
	add_filter( 'genesis_pre_get_option_site_layout',
		'__genesis_return_full_width_content');
}

/**
 * Remove the entry title
 * -----------------------------------------------------------------------------
 */
function gs_remove_entry_title()
{
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
    remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
    remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
}

/** 
 * Create a standard front page to start
 */
function gs_standard_front_page( $new_loop, $front_page_css = 'front-page' )
{
    gs_replace_genesis_loop( $new_loop );
    gs_full_width_layout();
    gs_remove_entry_title();
}

/**
 * Add widget area above the header.
 *
 * Styling can be found in scss/layout/_widget-above-header.scss, make sure
 *
 *    @import 'widget-above-header';
 *
 * Is uncommented in scss/layout/_layout.scss
 */
function gs_add_widget_above_header()
{
    $args = array(
        'id'            => 'before-header',
        'name'          => __( 'Before Header', 'Genesass' ),
        'description'   => __( 'This is a widget area before the header', 'Genesass' )
        );
    genesis_register_sidebar ( $args );

    add_action( 'genesis_before_header', 're_before_header_widget_area' );
    function re_before_header_widget_area( $args ) {
        $args = array(
            'before'        => "<div class='before-header widget-area'><div class='wrap'>",
            'after'         => "</div> <!-- before-header --> </div> <!-- wrap -->",
            );

        genesis_widget_area( 'before-header', $args );
    }
}

?>