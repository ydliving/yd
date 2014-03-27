<?php
/*
Template Name: PAGE
*/

?>

<?php get_header( $name = null ) ?>

				<div class="ind_con">
					<div class="ic_left">
						<div class="ta_con">
							<div class="tac_title">
								<span class="tt_1">主题活动</span><span class="tt_2">THEME ACTIVITY</span><span class="tt_3"></span>
							</div>
							

						</div>


						<div class="ta_con">
							<div class="tac_title">
								<span class="tt_1">活动掠影</span><span class="tt_2">ACTIVITY PHOTOS</span><span class="tt_4"></span>
							</div>

							<?php get_template_part( 'content' ) ?>

						</div>

						<?php get_sidebar( $name = null ) ?>

					</div>

				</div>

11				<?php get_footer(); ?>
