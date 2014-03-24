<div class="ap_con">
	<div class="apc_text"></div>
	<div class="apc_list">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="al_1">
			<span class="ai_img">
				<a href="http://www.ydliving.org/stories/2">
					<img alt="Medish 1" height="90" src="http://www.ydliving.org/system/images/BAhbB1sHOgZmSSIpMjAxMy8wMy8wMS8xM18yNF80M185OTVfbWVkaXNoXzEuanBnBjoGRVRbCDoGcDoKdGh1bWJJIgsxNTB4OTAGOwZU/135x90xmedish-1.jpg.pagespeed.ic.RchOT5NWxm.jpg" width="135" pagespeed_url_hash="62967714"/>
				</a>	
			</span>
			<span class="ai_text">
				<p><?php the_title() ?></p>
			</span>
		</div>
	  <?php endwhile; endif; ?>
	</div>
	</div>
</div>