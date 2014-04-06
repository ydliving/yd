<div class="acc_right">

  <div class="rb_con">

    <div class="tac_title">
      <span class="tt_1">近期活动</span><span class="tt_2">RECENT ACTIVITY</span>
    </div>

    <?php

    wp_reset_postdata();
    $argss = array(
      'post__not_in'  => get_option( 'sticky_posts' ),
      'post_type' => 'event',
      'post_limits' => 10, 
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


    <ul class="rbc_list">
      <?php while($the_query_2->have_posts()) : $the_query_2->the_post(); ?>
        <li>
         <a href="<?php the_permalink() ?>">
          <?php the_post_thumbnail(array(112, 168)) ?>
        </a>   
      </li>  
    <?php endwhile;  ?>

  </ul>

</div>

</div>
