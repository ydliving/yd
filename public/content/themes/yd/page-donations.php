
<?php
/*
Template Name: Donation
 */
?>
<?php get_header( $name = null ) ?>

<!-- end w960 -->
</div>
<div class="top_line2"></div>

<div class="con_w960">
	<div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span>捐赠帐户</span></div>
	<div class="ac_con">
		<div class="st_left">
			<div class="au_con2">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<?php the_content() ?>
				<?php endwhile; endif; ?>
				<!-- end au_con2 -->
			</div>
			<!-- end st_left -->
		</div>	
		<?php get_sidebar( 'donations' ) ?>
	</div>
	<!-- end con_w960 -->
</div>
<?php get_footer(); ?>
