<?php get_header( $name = null ) ?>

<div id="bannercontent">
	<div id="bannerlist">
		<?php putRevSlider( "home_slider" ) ?>
	</div>
			
	</div>


				<div class="ind_con">
					<div class="ic_left">
						<div class="ta_con">
							<div class="tac_title">

								<?php								

								$args = array(
									'post__in'  => get_option( 'sticky_posts' ),
									'post_type' => 'event',
									'post_limits' => 1
									);

								$the_query = new WP_Query( $args );	

								?>

								<span class="tt_1">主题活动</span>
								<span class="tt_2">THEME ACTIVITY</span>
								<span class="tt_3"></span>
							</div>
							<div class="tac_con">
						

								<?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="tcc_img">
									<?= the_post_thumbnail() ?>
								</div>
									<dl class="tcc_text">
										<dt><?php the_title( $before = '', $after = '', $echo = true ); ?></dt>
										<dd>时间:  <?php the_field('begin_at'); ?></dd>
										<dd>地点:  <?php the_field('address'); ?></dd>
										<dd>费用:  <?php the_field('cost') ?>   </dd>
										<dd>报名截止: <?php  the_field('apply_end_at') ?> </dd>
										<dd class="btn">
											<a href=<?php the_permalink() ?> />
												<img src="<?php  echo (get_template_directory_uri() . '/images/index_pic6.gif') ?>" />
											</a>
										</dd>
									</dl>
								<?php endwhile; else: ?>
								没有内容.

							<?php endif; ?>

							</div>

						</div>


						<div class="ta_con">
							<div class="tac_title">
								<span class="tt_1">活动掠影</span><span class="tt_2">ACTIVITY PHOTOS</span><span class="tt_4"></span>
							</div>
							
							<div class="ap_con">
								<div class="apc_text"></div>
								<div class="apc_list">
									<?php

									wp_reset_postdata();
									$argss = [
									'cat_id' => 7,
									'post__in'  => get_option( 'sticky_posts' ),
									'ignore_sticky_posts' => 1,
									'posts_per_page' => 3
									];

									$the_query_2 = new WP_Query( $argss );	

									?>

									<?php while($the_query_2->have_posts()) : $the_query_2->the_post(); ?>
									<div class="al_1">
										<span class="ai_img">
											<a href="<?= the_permalink() ?>">
												<?= the_post_thumbnail() ?>
											</a>	
										</span>
											<p class="ai_text"><?php the_title() ?></p>
									</div>
								  <?php endwhile;  ?>
								</div>
								</div>
							</div>

						</div>

						<?php get_sidebar( 'front' ) ?>

					</div>

				</div>

				<?php get_footer(); ?>
