<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title><?php the_title( $before = '', $after = '', $echo = true ) ?></title>
	<?php wp_head(); ?>
</head>

<body <?php echo body_class(); ?> >

	<div class="yd_con">

		<div class="top_line"></div>

		<div class="w960">
			<div class="top">
				<div class="logo">
					<img src="<?php echo get_template_directory_uri();  ?>/images/logo.jpg" alt="" width="104" height="100" />
				</div>
				<div class="top_right">
					<div class="search">
						<form method="get" action="http://www.google.com/search">
							<!-- Place this tag where you want the search box to render -->
							<gcse:searchbox-only></gcse:searchbox-only>

						</form>

					</div>
					<ul class="inline-list">
					
						 <?php if( is_user_logged_in() ): ?> 
						 <?php 
						 global $current_user;
						 get_currentuserinfo();
						  ?>
						 <li>您好, <a style="display:inline" href="/?page_id=87"><?php echo get_current_user(); ?></a></li>
						 <li><a href="<?php echo wp_logout_url() ?>"> 登出 </a></li>
						 <?php else: ?>
						<li><a href="<?php echo wp_login_url( $redirect = '', $force_reauth = false ) ?>">登录</a></li>
						<li><a href="<?php echo wp_registration_url(); ?> ">注册</a></li>
						<?php endif; ?>
					</ul>

						<?php get_template_part( 'menu', $name = null ) ?>
					
				</div>

			</div>
