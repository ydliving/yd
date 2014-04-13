
<?php
/*
Template Name: Event
*/

?>
<?php get_header( $name = null ) ?>

<!-- end w960 -->
</div>
<div class="top_line2"></div>

<div class="con_w960">
	<div class="prompt">您现在的位置：<a href="/">首页</a> &gt; <span>活动</span></div>

	<div class="recently">

		<?php								

		$args = array(
			'post__in'  => get_option( 'sticky_posts' ),
			'post_type' => 'event',
			'post_limits' => 1
			);

		$the_query = new WP_Query( $args );	

		?>

		<?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="rec_img">
				<?php the_post_thumbnail(array(180, 270)) ?>
			</div>
			<dl class="rec_text">
				<dt><?php the_title( $before = '', $after = '', $echo = true ); ?></dt>
				<dd>时间:  <?php the_field('begin_at'); ?></dd>
				<dd>地点:  <?php the_field('address'); ?></dd>
				<dd>费用:  <?php the_field('cost') ?>   </dd>
				<dd>报名截止: <?php the_field('apply_end_at') ?> </dd>

				<dd>活动详情: <?php  the_excerpt() ?></dd>
				<dd class="button1">
					<a href=<?php the_permalink() ?> />
						<img src="<?php  echo (get_template_directory_uri() . '/images/index_pic6.gif') ?>" />
					</a>
				</dd>
			</dl> 
		<?php endwhile; endif; ?>

	</div>


	<?php

	wp_reset_postdata();
	$argss = array(
		'post__not_in'  => get_option( 'sticky_posts' ),
		'post_type' => 'event',
		'post_limits' => 4, 
		'nopaging' => true,
		'meta_query' => array(
			array(
				'key' => 'apply_end_at',
				'value' => date("Y-m-d"),
				'compare' => '>',
				'type' => 'DATE'
				)

			)		
		);


	$the_query_2 = new WP_Query( $argss );	
	?>

	<?php if($the_query_2->have_posts()): ?>

		<div class="jq_activity">
			<div class="tac_title">
				<span class="tt_1">近期活动</span><span class="tt_2">RECENT ACTIVITY</span><span class="tt_8"></span>
			</div>
			<ul class="act_review">

				<?php while($the_query_2->have_posts()) : $the_query_2->the_post(); ?>


					<li> 


						<span class="ar_img">
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail() ?>
							</a>	
						</span> 
						<span class="ar_title">
							<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
						</span> 
						<span class="ar_share">
							<div id="recent_10">

								<div style="clear:both"></div>
							</div>
						</span> 
					</li>

				<?php endwhile;  ?>


			</ul>

		</div>

	<?php endif; ?>




	<div class="review">
		<div class="tac_title">
			<span class="tt_1">往期回顾</span><span class="tt_2">REVIEW BACK</span><span class="tt_5"></span>
		</div>
		<ul class="act_review">

			<?php

			wp_reset_postdata();
			$argss = array(
				'post__not_in'  => get_option( 'sticky_posts' ),
				'post_type' => 'event',
				'post_limits' => 4, 
				'nopaging' => true,
				'meta_query' => array(
					array(
						'key' => 'apply_end_at',
						'value' => date("Y-m-d"),
						'compare' => '<',
						'type' => 'DATE'
						)

					)		
				);


			$the_query_2 = new WP_Query( $argss );	
			?>
			<?php while($the_query_2->have_posts()) : $the_query_2->the_post(); ?>


				<li> 

					<span class="ar_img">
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail([160, 240]) ?>
						</a>	
					</span> 
					<span class="ar_title">
						<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
					</span> 
					<span class="ar_share">
						<div id="recent_10">

							<div style="clear:both"></div>
						</div>
					</span> 
				</li>

			<?php endwhile;  ?>

		</ul> 


	</div>
</div>



<?php get_footer(); ?>
