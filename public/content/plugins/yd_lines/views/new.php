<form action="/lines/create" method="post" accept-charset="utf-8">
  <?php wp_nonce_field('yd_lines_create', 'yd_lines_create'); ?>
  
    <?php require '_form.php' ?>

   </div>
 </div>
 <p><input type="submit"  class="button" value="保存"></p>
</form>
