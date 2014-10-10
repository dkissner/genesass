<?php

require_once( 'lib/utils.php' );
echo "FOO";
gs_standard_front_page( 'gs_custom_loop' );

function gs_custom_loop()
{
	echo "<h1>Hello, World</h1>";
}

genesis();