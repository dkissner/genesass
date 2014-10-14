<?php

function gs_super_hero( $overlaycb )
{
	?>

	<div class='super-hero'>
		<div class='super-hero-inner'>

			<?php $overlaycb(); ?>

		</div> <!-- super-hero-inner -->
	</div> <!-- super-hero -->

	<?php
}