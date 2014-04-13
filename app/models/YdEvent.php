<?php
class YdEvent extends ActiveRecord\Model
{
  static $table_name = 'wp_posts';
  static $has_many = [
    ['lines', 'class_name' => 'YdLine']
  ];
}
?>

