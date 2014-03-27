	<div class="manage-capabilities">
		<div>
			<h2><?php echo $group->name ?></h2>
		</div>
	
		<div>
			<?php echo $group->description; ?>
		</div>
		
		<h3>组员</h3>

		<?php 
		$user_group_table = _groups_get_tablename( "user_group" );
		$query = $wpdb->prepare(
			"SELECT * FROM $wpdb->users LEFT JOIN $user_group_table ON $wpdb->users.ID = $user_group_table.user_id WHERE $user_group_table.group_id = %d", $group->group_id
			);
		$users = $wpdb->get_results($query);

		if ( $users ) {
			foreach( $users as $user ) {
				$output .=  wp_filter_nohtml_kses( $user->display_name )  . ' ';
			}
		}

		echo $output;
		?>

		<div class="clear" ></div>

		<?php 
		  $atts = array('group' => $group->group_id);
			echo Groups_Shortcodes::groups_join( $atts, $content = null );
			echo Groups_Shortcodes::groups_leave( $atts, $content = null ) 
		 ?>


	</div>

