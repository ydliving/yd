<h3>我创建的活动</h3>

<?php if(count($lines) > 0): ?>

<table>
  <thead>
    <tr>
      <th width="200">主题</th>
      <th>活动日期</th>
      <th width="150">集合时间</th>
      <th width="150">集合地点</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($lines as $line): ?>
    <tr>
    <td><?= $line->event->post_title; ?></td>
      <td><?= $line->begin_at; ?></td>
      <td><?= $line->group_begin_at; ?></td>
      <td><?= $line->group_address; ?></td>
      <td>
        <a href="/lines/<?= $line->id ?>/delete"> 删除 </a>
        <a href="/lines/<?= $line->id ?>/edit"> 编辑 </a>
        <a href="/lines/<?= $line->id ?>/show"> 查看 </a>
      </td> 
    </tr>
    <?php endforeach;?>
  </tbody>

  <?php else: ?>
<p> 暂时没有创建的路线.</p>
  <?php endif; ?>
</table>