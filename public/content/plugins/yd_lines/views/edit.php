<form action="/lines/<?= $line->id ?>/update" method="post" accept-charset="utf-8">
  <?php wp_nonce_field('yd_lines_update', 'yd_lines_update'); ?>
  
    <?php require '_form.php' ?>

   </div>
 </div>
 <p><input type="submit"  class="button" value="更新"></p>
</form>
