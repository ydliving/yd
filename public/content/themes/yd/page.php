<?php get_header( $name = null ) ?>

<!-- end w_960 -->
</div>
<div class="top_line2"></div>

<div class="con_w960">

<div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span><?= the_title() ?></span></div>
	<div class="ac_con">
		<div class="st_left">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<?php the_content() ?>
			<?php endwhile; endif; ?>
		</div>	
		<?php get_sidebar( 'donations' ) ?>
	</div>
</div>
<?php get_footer(); ?>
