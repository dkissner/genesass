<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesass' );
define( 'CHILD_THEME_URL', 'http://LakeParkOnline.com/' );
define( 'CHILD_THEME_VERSION', '0.0.1' );

/**
 * We are now calling lib/utils.c:gs_load_google_fonts() from lib/theme-options.php
 */
//* Enqueue Lato Google font
/*
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}
*/

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

// Now set the options you'd like to turn on.
require_once 'theme-options.php';
