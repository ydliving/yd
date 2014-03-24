<div class="footer_bg">
	<div class="footer">
		<div class="footer_left">
				<?php 
				$args = array(
					'theme_location' => 'footer_menu', 
					'items_wrap' => '%3$s', 
					'container' => '', 
					'link_after' => ' | ', 
					'echo' => false
					);
				// wp_nav_menu($args); 
				echo strip_tags(wp_nav_menu( $args ), '<a>' );
				?>
		</div>
		<div class="footer_right">版权所有(C) <?php echo bloginfo('name') ?>上海新途社区健康促进社</div>
	</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>