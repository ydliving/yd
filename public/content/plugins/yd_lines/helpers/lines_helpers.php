<?php 

function event_select() {
	echo '<select name="line[event_id]" >';
	wp_reset_postdata();
	$args = array(
		'post_type' => 'event',
		);
	$the_query = new WP_Query( $args );
	if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
	?>
	<option value="<?= the_ID() ?>"><?= the_title(); ?></option>
	<?php
	endwhile;endif;
	echo '</select>';
}