<?php

namespace app\models;

class YDGroup {

	public $user;

	function __construct($user) {
		$this->user = $user;
	}

	public function my_join_groups()
	{
		global $wpdb;

		# TABLE
		$user_group_table = _groups_get_tablename('user_group');
		$group_table = _groups_get_tablename('group');

		# ORDER 
		$orderby = "$group_table.group_id";
		$order = 'DESC';

		$prepare = $wpdb->prepare(
			"SELECT * FROM $user_group_table LEFT JOIN $group_table ON $user_group_table.group_id = $group_table.group_id WHERE $user_group_table.user_id = %d ORDER BY $orderby $order",
			$this->user_id()
			);
		$results = $wpdb->get_results($prepare);
		return $results;
	}

	public function user_id()
	{
		return $this->user->ID;
	}

}
?>