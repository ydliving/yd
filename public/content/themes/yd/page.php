<?php get_header( $name = null ) ?>

<div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span>捐赠帐户</span></div>
<div class="ac_con">
  <div class="st_left">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <?php the_content() ?>
    <?php endwhile; endif; ?>
  </div>	
  <?php get_sidebar( 'donations' ) ?>
</div>
<?php get_footer(); ?>
