<table>
  <thead>
    <tr>
      <th width="200">组名</th>
      <th>描述</th>
      <th width="150">成员</th>
      <th width="150">操作</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($results); $i++): ?>
    <tr>
      <td><?php echo $results[$i]->name ?></td>
      <td><?php echo $results[$i]->despition ?></td>
      <td>
        <?php

        $user_group_table = _groups_get_tablename( "user_group" );
        $query = $wpdb->prepare(
          "SELECT * FROM $wpdb->users LEFT JOIN $user_group_table ON $wpdb->users.ID = $user_group_table.user_id WHERE $user_group_table.group_id = %d",
          $results[$i]->group_id
          );
        $users = $wpdb->get_results($query);

        if ( $users ) {
          foreach( $users as $user ) {
            $output .=  wp_filter_nohtml_kses( $user->display_name )  . ' ';
          }
        }

        echo $output;
        ?>
      </td>
      <td>
        <a href="/groups/<?php echo $results[$i]->group_id ?>/delete">删除</a>
        <a href="/groups/<?php echo $results[$i]->group_id ?>/edit">编辑</a>
        <a href="/groups/<?php echo $results[$i]->group_id ?>/show">查看</a>
      </td>
    </tr>
  <?php endfor; ?>
  
  </tbody>
</table>

<?php 
  if ( $paginate ) {
    require_once( GROUPS_CORE_LIB . '/class-groups-pagination.php' );
    $pagination = new Groups_Pagination($count, null, $row_count);
    $output .= '<div class="tablenav bottom">';
    $output .= $pagination->pagination( 'bottom' );
    $output .= '</div>';
    echo($output);
  }
 ?>
