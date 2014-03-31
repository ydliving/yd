
<?php
/*
Template Name: Topics
*/

?>
<?php get_header( $name = null ) ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="st_left">
		<div class="story_con">
		<div class="story_title"><?php the_title(); ?></div>
			<div class="story_date">时间：<<?php the_date( $d, $before, $after, $echo );?></div>
			<?php the_content() ?>
		</div>

	<?php endwhile; ?>

	<?php get_sidebar( 'stories' ) ?>

	<?php get_footer(); ?>
