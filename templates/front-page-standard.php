<?php

require_once( 'lib/utils.php' );
require_once( 'lib/super-hero.php' );

gs_standard_front_page( 'gs_custom_loop' );

function gs_custom_loop()
{
	echo "FOO";
	$html = "<h1>Hello, World!</h1>";

	gs_super_hero( $html );
}

genesis();