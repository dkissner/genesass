<?php

require_once( 'lib/utils.php' );
require_once( 'lib/super-hero.php' );

add_filter( 'body_class', 'gs_body_class' );
function gs_body_class( $classes ) {
	$classes[] = 'front-page';
	return $classes;
}

gs_standard_front_page( 'gs_custom_loop' );

function gs_custom_loop()
{
	gs_super_hero( 'gs_super_hero_overlay' );
}

function gs_super_hero_overlay()
{
	?>
	<div class='super-hero-overlay'>
		<h1>Hello, World</h1>
	</div>
	<?php
}

genesis();