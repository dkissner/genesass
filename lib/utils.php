<?php

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


?>