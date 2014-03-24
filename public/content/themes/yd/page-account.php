
<?php
/*
Template Name: Account
*/

?>
<?php get_header( $name = null ) ?>

<div class="row">
	<div class="large-3 medium-4 columns">

		<?php get_sidebar( 'account' ) ?>

	</div>

	<div class="large-9 medium-8 columns">
			
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

		<?php the_content() ?>

	<?php endwhile; endif; ?>
	</div>
</div>


<?php# get_sidebar( $name = null ) ?>

<?php get_footer(); ?>
