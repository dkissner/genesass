<?php

require_once 'lib/utils.php';
require_once 'lib/genesis-hacks.php';

/*
 * Load up the fonts we want, we'll use Google Fonts
 */
//gs_load_google_fonts( 'google-fonts-lato', 'Lato:300,700' );
//gs_load_google_fonts( 'google-fonts-open-sans', 'Open+Sans:400italic,700italic,400,700,800' );

// Load FULL bootstrap if you want
//require_once('lib/bootstrap.php');

// [Un]comment if you [don't] want sticky menus
//gs_do_secondary_sticky_menu();

// Load font-awesome
// gs_load_font_awesome();

// Uncomment if you want to move the primary navbar above the header
gs_primary_navbar_above_header();

// Uncomment if you want to add a widget area above the header
gs_add_widget_above_header();


?>