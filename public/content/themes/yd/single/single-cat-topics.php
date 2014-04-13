
<?php
/*
Template Name: Topics
*/

?>
<?php get_header( $name = null ) ?>

<!-- end w960 -->
</div>
<div class="top_line2"></div>


<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content() ?>

<?php endwhile; ?>

<?php get_sidebar( 'topics' ) ?>

<?php get_footer(); ?>
