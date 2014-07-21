<?php
/*
 * XXX watch out for a file name conflict!  Or call with absolute path
 */
require_once 'utils.php';

// [Un]comment if you [don't] want sticky menus
gs_do_secondary_sticky_menu();

// Load font-awesome
gs_load_font_awesome();

// Uncomment if you want to move the primary navbar above the header
// gs_primary_navbar_above_header();

/**
 * Comment this out if you do NOT want your entry titles to become 
 * large banner under your header.
 */
require_once 'entry-title-banner.php';

?>