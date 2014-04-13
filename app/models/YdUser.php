<?php
class YdUser extends ActiveRecord\Model
{
  static $table_name = 'wp_users';
  static $has_many = [
    ['lines', 'class_name' => 'YdLine', 'foreign_key' => 'user_id']
  ];
}
?>


