
<?php
/*
Template Name: Topics
*/

?>
<?php get_header( $name = null ) ?>

<?php								
$args = array(
	'category_name' => 'topics',
	'post__in'  => get_option( 'sticky_posts' ),
	'post_type' => 'post',
	'post_limits' => 1
	
	);

$the_query = new WP_Query( $args );	

?>

<?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<?php the_content() ?>

<?php endwhile; endif; ?>

<?php get_sidebar( 'topics' ) ?>

<?php get_footer(); ?>
