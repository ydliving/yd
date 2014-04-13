
<?php
/*
Template Name: Stories
*/
?>
<?php get_header( $name = null ) ?>

<!-- end w960 -->
</div>
<div class="top_line2"></div>

<?php								
$args = [
	'cat_id' => 7,
	'post__in'  => get_option( 'sticky_posts' ),
	'post_type' => 'post',
  'ignore_sticky_posts' => 1,
  'posts_per_page' => 1
	];

$the_query = new WP_Query( $args );	

?>
<div class="con_w960">
  <div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span>故事</span></div>
  <div class="ac_con">
    <?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <div class="st_left">
        <div class="story_con">
          <div class="story_title"><?php the_title(); ?></div>
          <div class="story_date">时间：<?php the_date( );?></div>
          <?php the_content() ?>
        </div>
      </div>
    <?php endwhile; endif; ?>
    <?php get_sidebar( 'stories' ) ?>
    <!-- end .ac_con -->
  </div>
  <!-- end .con_w960 -->
</div>

<?php get_footer(); ?>
