<div class="menu">
	<ul class="m1">
		<?php 
		$args = array(
			'theme_location' => 'top_menu', 
			'items_wrap' => '%3$s', 
			'container' => ''
			);
		wp_nav_menu($args); 
		?>
	
	</ul>
</div>