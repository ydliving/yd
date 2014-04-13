
<?php
/*
Template Name: Topics
*/

?>
<?php get_header( $name = null ) ?>

<!-- end w960 -->
</div>
<div class="top_line2"></div>


<div class="con_w960">
	<div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span>故事</span></div>

	<div class="ac_con">
		<div class="st_left">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="story_con">
					<div class="story_title"><?= the_title(); ?></div>
					<div class="story_date">时间：<?= the_date( $d, $before, $after, $echo );?></div>
					<?= the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>

		<?php get_sidebar( 'stories' ) ?>

	</div>
</div>


<?php get_footer(); ?>
