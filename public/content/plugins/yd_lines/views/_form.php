
  <div class="row">
    <div class="small-8">


      <div class="row">
        <div class="small-3 columns">
          <label for="line[event_id]" class="right inline">主题</label>
        </div>
        <div class="large-9 columns">
          <?= event_select(); ?>
        </div>
      </div>

      <div class="row">
       <div class="small-3 columns">
         <label for="line[begin_at]" class="right inline">活动日期: </label>
       </div>
       <div class="small-9 columns">
         <input  id="dp1" size="16" type="text" value="<?= $line->begin_at ?>" name="line[begin_at]">
         <i class="icon-calendar"></i>
       </div>
     </div> 


      <div class="row">
        <div class="small-3 columns">
          <label for="line[group_begin_at]" class="right inline">集合时间: </label>
        </div>
        <div class="small-9 columns">
        <input  id="dp2" size="16" type="text" value="<?= $line->group_begin_at ?>" name="line[group_begin_at]">
         <i class="icon-calendar"></i>
       </div>
     </div> 


      <div class="row">
        <div class="small-3 columns">
          <label for="line[group_address]" class="right inline">集合地点: </label>
        </div>
        <div class="small-9 columns">
        <input  size="16" type="text" value="<?= $line->group_address ?>" name="line[group_address]">
         
       </div>
     </div> 

      <div class="row">
        <div class="small-3 columns">
          <label for="line[detail]" class="right inline">线路详情/行程安排: </label>
        </div>
        <div class="small-9 columns">
        <textarea name="line[detail]" rows="5" cols="50">
          <?= $line->detail ?>
        </textarea>
      </div>
     </div> 

      <div class="row">
        <div class="small-3 columns">
          <label for="line[cost]" class="right inline">活动报名费: </label>
        </div>
        <div class="small-9 columns">
        <input  size="16" type="text" value="<?= $line->cost ?>" name="line[cost]">
       </div>
     </div> 

      <div class="row">
        <div class="small-3 columns">
          <label for="line[transport]" class="right inline">交通: </label>
        </div>
        <div class="small-9 columns">
        <input  size="16" type="text" value="<?= $line->transport ?>" name="line[transport]">
       </div>
     </div> 


      <div class="row">
        <div class="small-3 columns">
          <label for="line[building]" class="right inline">周边设施: </label>
        </div>
        <div class="small-9 columns">
        <input  size="16" type="text" value="<?= $line->building ?>" name="line[building]">
       </div>
     </div> 

      <div class="row">
        <div class="small-3 columns">
          <label for="line[note]" class="right inline">说明: </label>
        </div>
        <div class="small-9 columns">
         <textarea name="line[note]" rows="5" cols="50"><?= $line->note ?></textarea>
       </div>
     </div> 

     <h3>联系人信息</h3>

      <div class="row">
        <div class="small-3 columns">
          <label for="line[username]" class="right inline">姓名: </label>
        </div>
        <div class="small-9 columns">
          <input  size="16" type="text" value="<?= $line->username ?>" name="line[username]">
       </div>
     </div> 

      <div class="row">
        <div class="small-3 columns">
          <label for="line[phone]" class="right inline">电话: </label>
        </div>
        <div class="small-9 columns">
          <input  size="16" type="text" value="<?= $line->phone ?>" name="line[phone]">
       </div>
     </div> 

      <div class="row">
        <div class="small-3 columns">
          <label for="line[email]" class="right inline">邮箱: </label>
        </div>
        <div class="small-9 columns">
          <input  size="16" type="text" value="<?= $line->email ?>" name="line[email]">
       </div>
     </div> 


   </div>
 </div>
