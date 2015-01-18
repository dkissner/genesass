<?php

/*
    Template Name: Front Page
*/
require_once 'lib/utils.php';
require_once 'lib/genesis-hacks.php';

add_filter( 'body_class', 'gs_body_class' );
function gs_body_class( $classes ) {
	$classes[] = 'front-page';
	return $classes;
}

gs_standard_front_page( 'gs_custom_loop' );

function gs_custom_loop()
{
	gs_super_hero();
}

function gs_super_hero()
{
	?>
	<div class='super-hero'>
		<div class='super-hero-inner'>

		</div> <!-- super-hero-inner -->
	</div> <!-- super-hero -->
	<?php
}

genesis();