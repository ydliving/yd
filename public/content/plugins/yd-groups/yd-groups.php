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



function create_group_form($atts, $content = null ) {

		is_user_logged_in() || auth_redirect();

		// auth_redirect();

	  global $wpdb;

		$name		= isset( $_POST['name-field'] ) ? $_POST['name-field'] : '';
		$description		= isset( $_POST['description-field'] ) ? $_POST['description-field'] : '';

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				$group_id = Groups_Group::create( compact( "creator_id", "datetime", "parent_id", "description", "name" ) );
				// TODO: 跳转url
				// wp_redirect('', '')		
		}

		
		// if ( !current_user_can( GROUPS_ADMINISTER_GROUPS ) ) {
		// 	wp_die( __( 'Access denied.', GROUPS_PLUGIN_DOMAIN ) );
		// }
		
		$current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$current_url = remove_query_arg( 'paged', $current_url );
		$current_url = remove_query_arg( 'action', $current_url );
		$current_url = remove_query_arg( 'capability_id', $current_url );
		
		$capability  = isset( $_POST['capability-field'] ) ? $_POST['capability-field'] : '';
		$description = isset( $_POST['description-field'] ) ? $_POST['description-field'] : '';
		
		$capability_table = _groups_get_tablename( 'capability' );

		require ('views/new.php');
		
		$content = ob_get_clean();

		return $content;
			

}

add_shortcode( 'add_group_form', 'create_group_form' );


function my_group_list($atts, $content = null ){


	is_user_logged_in() || auth_redirect();

	global $wpdb;

	global $user_ID;

	global $wp_query;

	// var_dump($wp_query);

	# ACTION VIEW

	if (isset($_GET['action']) && $_GET['action'] == 'show') {
    $group_id =  get_query_var( 'group_id' );
    $group = Groups_Group::read( $group_id );
    require 'views/show.php';
		exit();
	}

	# ACTION DELETE

	if (isset($_GET['action']) && $_GET['action'] == 'delete') {
		echo "delete";
		exit();
	}


	# ACTION EDIT

	if (isset($_GET['action']) && $_GET['action'] == 'edit') {
		echo "edit";
		exit();
	}


	
	# ACTION JOIN

	if (isset($_GET['action']) && $_GET['action'] == 'join') {
		echo "edit";
		exit();
	}



   
	# ACION INDEX
	# FILTER

	$group_table = _groups_get_tablename( "group" );

	$filters = array();
	$filter_params = array();

	$filters[] = " $group_table.creator_id = %d ";
	$filter_params[] = $user_ID;

	if ( !empty( $filters ) ) {
		$filters = " WHERE " . implode( " AND ", $filters );
	} else {
		$filters = '';
	}


	# ORDER 

	$orderby = isset( $_GET['orderby'] ) ? $_GET['orderby'] : null;
	switch ( $orderby ) {
		case 'group_id' :
		case 'name' :
			break;
		default:
			$orderby = 'name';
	}

	$order = isset( $_GET['order'] ) ? $_GET['order'] : null;
	switch ( $order ) {
		case 'asc' :
		case 'ASC' :
			$switch_order = 'DESC';
			break;
		case 'desc' :
		case 'DESC' :
			$switch_order = 'ASC';
			break;
		default:
			$order = 'ASC';
			$switch_order = 'DESC';
	}

	# PAGNATE

	
	define(GROUPS_GROUPS_PER_PAGE, 10);


	$paged = isset( $_GET['paged'] ) ? intval( $_GET['paged'] ) : 0;

	$row_count = isset( $_POST['row_count'] ) ? intval( $_POST['row_count'] ) : 0;

	if ($row_count <= 0) {
		$row_count = Groups_Options::get_user_option( 'groups_per_page', GROUPS_GROUPS_PER_PAGE );
	} else {
		Groups_Options::update_user_option('groups_per_page', $row_count );
	}


	$count_query = $wpdb->prepare( "SELECT COUNT(*) FROM $group_table $filters", $filter_params );

	$count  = $wpdb->get_var( $count_query );
	if ( $count > $row_count ) {
		$paginate = true;
	} else {
		$paginate = false;
	}
	$pages = ceil ( $count / $row_count );
	if ( $paged > $pages ) {
		$paged = $pages;
	}
	

	$offset = isset( $_GET['offset'] ) ? intval( $_GET['offset'] ) : 0;
	if ( $offset < 0 ) {
		$offset = 0;
	}

	if ( $paged != 0 ) {
		$offset = ( $paged - 1 ) * $row_count;
	}

	$query = $wpdb->prepare(
		"SELECT * FROM $group_table
		$filters
		ORDER BY $orderby $order
		LIMIT $row_count OFFSET $offset",
		$filter_params
	);

	$results = $wpdb->get_results( $query, OBJECT );
	

	require('views/index.php');

 
}

add_shortcode( 'yd_my_groups', 'my_group_list' );

?>
