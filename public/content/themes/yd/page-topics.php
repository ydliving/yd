
<?php
/*
Template Name: Topics
*/
?>
<?php get_header( $name = null ) ?>
<!-- end w960 -->
</div>
<div class="top_line2"></div>
<?php								
$args = [
'category_name' => 'topics',
'post__in'  => get_option( 'sticky_posts' ),
'post_type' => 'post',
'post_limits' => 1
];
$the_query = new WP_Query( $args );	
?>

<div class="con_w960">
  <div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span>专题</span></div>
  <div class="ac_con">
    <div class="st_left">
      <?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="sub_title"><?= the_title() ?></div>
        <div class="sub_con">
         <?= the_content() ?>
       </div>
     <?php endwhile; endif; ?>
     <!-- end st_left-->
   </div>
   <?php get_sidebar( 'topics' ) ?>
   <!-- end ac_con -->
 </div> 
</div>
<?php get_footer(); ?>
