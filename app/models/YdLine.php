<?php
class YdLine extends ActiveRecord\Model
{
  static $table_name = 'yd_lines';
  static $belongs_to = [
    ['user', 'readonly' => true, 'class_name' => 'YdUser', 'foreign_key' => 'ID'],
    ['event', 'class_name' => 'YdEvent', 'foreign_key' => 'event_id']
  ];

  static $delegate = [
   ['post_title', 'to' => 'event']
  ];

  function owner_by($user_id) {
  	if($this->user_id == $user_id)
  		return true;
  	return false;
  }
}
?>


