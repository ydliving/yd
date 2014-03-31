
<?php
/*
Template Name: Topics
*/

?>
<?php get_header( $name = null ) ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content() ?>

<?php endwhile; ?>

<?php get_sidebar( 'topics' ) ?>

<?php get_footer(); ?>
