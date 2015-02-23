<?php

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

/**
 * Replace the footer credits
 */
function gs_replace_footer_credits()
{
    remove_action( 'genesis_footer', 'genesis_do_footer' );
    add_action( 'genesis_footer', 'gs_custom_footer' );
    function gs_custom_footer() {

       ?>
       <p class='footer-copyright'>&copy Copyright, Eddy Consulting, LLC 2013 - 2015</p>
       <p class='footer-site-by'>Site by <a href='http://LakeParkOnline.com/services'>Lake Park Online</a></p>
       <?php
   }
}
