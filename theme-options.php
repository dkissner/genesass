<?php
/*
 * XXX watch out for a file name conflict!  Or call with absolute path
 */
require_once 'lib/utils.php';

/*
 * Load up the fonts we want, we'll use Google Fonts
 *
 * Don't get too crazy, this could slow things down.
 */
gs_load_google_fonts( 'google-fonts-lato', 'Lato:300,700' );
gs_load_google_fonts( 'google-fonts-open-sans', 'Open+Sans:400italic,700italic,400,700,800' );

// [Un]comment if you [don't] want sticky menus
gs_do_secondary_sticky_menu();

// Load font-awesome
gs_load_font_awesome();

// Uncomment if you want to move the primary navbar above the header
gs_primary_navbar_above_header();

/**
 * Comment this out if you do NOT want your entry titles to become 
 * large banner under your header.
 */
require_once 'lib/entry-title-banner.php';

?>