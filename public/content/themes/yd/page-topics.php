
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
<div class="ac_con">
      <div class="st_left">
        <?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="story_con">
           <?php the_content() ?>
           <!--end story_con-->
          </div>
        <?php endwhile; endif; ?>
      <!-- end st_left-->
      </div>
      <?php get_sidebar( 'topics' ) ?>
<!-- end ac_con -->
</div> 
<?php get_footer(); ?>
