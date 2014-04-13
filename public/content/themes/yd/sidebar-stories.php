<div class="acc_right">

  <div class="sub_list">
    <div class="mission_title"><span class="mt_1">专题列表</span></div>

    <?php                               
    $args = array(
      'category_name' => 'stories',
      'post_type' => 'post',
      'orderby' => 'ID',
      'order' => 'DESC'
      );

    $the_query = new WP_Query( $args ); 

    ?>

    <ul class="sl_con">
      <?php if( $the_query->have_posts()) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <li>
         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
       </li>
     <?php endwhile; endif; ?>

   </ul>
 </div>
</div>

