<?php 
/*
Plugin Name: YD Groups
Description: 用户组建立、管理
Author: Weston Wei
Author URI: http://weixuhong.com
Version: 1.0.0
*/

// add_action('init', 'boj_products_rewrite');
// function boj_products_rewrite() {
// 	add_rewrite_tag( '%my-group%', '([^/]+)');
// 	add_permastruct( 'product', 'shop' . '/%product%' );
// }

require 'shortcodes/yd-group-shortcodes.php';

add_action('init', 'boj_rrs_add_rules' ); 

function boj_rrs_add_rules() {
	add_rewrite_rule( 'groups/?([^\]*)/?([^\]*])', '?pagename=my-group&page_id=113&group_id=2&action=view', 'top');
}

add_filter( 'query_vars', 'boj_rrs_add_query_var' ); 

function boj_rrs_add_query_var( $vars ) {
  $vars[] = 'group_id';
  $vars[] = 'action';
  $vars[] = 'page_id';
  return $vars; 
}

add_filter( 'login_url' , 'force_reauth_to_0', 100 );

function force_reauth_to_0($url) {
	$new_url = str_replace("reauth=1", "reauth=0", $url);
	return $new_url;	
}

add_action( 'init', 'do_ob_start' );

function do_ob_start(){
	ob_start();
}

add_action('groups_created_group', 'add_more_fields');

function add_more_fields($results){
	global $wpdb;
	$group_table = _groups_get_tablename( 'group' );
	$group_id = $results;

	if(isset($_POST['slogon-field']) || isset($_POST['goal-field'])) {
		$slogon = $_POST['slogon-field'];
		$goal = $_POST['goal-field'];
		$prepare = $wpdb->prepare(
			"UPDATE $group_table SET slogon = %s, goal = %s WHERE group_id = %d",
			$slogon,
			$goal,
			Groups_Utility::id( $group_id )
		);
		$wpdb->query($prepare);
	}
	return $results;
}


add_action('groups_updated_group', 'update_more_fields');

function update_more_fields($results){
	global $wpdb;
	$group_table = _groups_get_tablename( 'group' );
	$group_id = $results;

	if(isset($_POST['slogon-field']) || isset($_POST['goal-field'])) {
		$slogon = $_POST['slogon-field'];
		$goal = $_POST['goal-field'];
		$prepare = $wpdb->prepare(
			"UPDATE $group_table SET slogon = %s, goal = %s WHERE group_id = %d",
			$slogon,
			$goal,
			Groups_Utility::id( $group_id )
		);
		$wpdb->query($prepare);
	}
	return $results;
}



?>
