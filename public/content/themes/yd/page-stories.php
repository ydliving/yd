
<?php
/*
Template Name: Stories
*/

?>
<?php get_header( $name = null ) ?>

<?php								
$args = array(
	'category_name' => 'stories',
	'post__in'  => get_option( 'sticky_posts' ),
	'post_type' => 'post',
	'post_limits' => 1

	);

$the_query = new WP_Query( $args );	

?>

<?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<div class="st_left">
		<div class="story_con">
		<div class="story_title"><?php the_title(); ?></div>
			<div class="story_date">时间：<?php the_date( );?></div>
			<?php the_content() ?>
		</div>


<?php endwhile; endif; ?>

<?php get_sidebar( 'stories' ) ?>

<?php get_footer(); ?>
