
<?php
/*
Template Name: Downloads
*/

?>
<?php get_header( $name = null ) ?>

<?php								
$args = array(
	'category_name' => 'downloads',
	'post_type' => 'post',
	'orderby' => 'ID',
	'order' => 'DESC'

	);

$the_query = new WP_Query( $args );	

?>
<div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span>指南</span></div>

<div class="review">
	<ul class="guide_list">
		<?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<li>
				<span class="gl_img">
					<?php the_post_thumbnail() ?>	
				</span>
				<span class="gl_title"><?php the_title() ?></span>
				<span class="gl_button">
					<?php   $attachments = new Attachments( 'attachments', $ID ); ?>
					<?php if( $attachments->exist() ) : ?>
						<?php while( $attachment = $attachments->get() ) : ?>
							<a href="<?php echo $attachments->url(); ?>">点击下载</a>
						<?php endwhile; ?>
					<?php endif; ?>  
				</span>
			</li>
		<?php endwhile; endif; ?>
		
	</ul>

</div>


<?php get_footer(); ?>
