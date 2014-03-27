	'<div class="manage-capabilities">' .
	'<div>' .
	'<h2>' .
	"title" .
	'</h2>' .
	'</div>' .
	'<form id="add-capability" action="' . $current_url . '" method="post">' .
	'<div class="capability new">' .
	
	'<div class="field">' .
	'<label for="capability-field" class="field-label first required">' .__( 'Capability', GROUPS_PLUGIN_DOMAIN ) . '</label>' .
	'<input id="name-field" name="capability-field" class="capability-field" type="text" value="' . esc_attr( stripslashes( $capability ) ) . '"/>' .
	'</div>' .
	
	'<div class="field">' .
	'<label for="description-field" class="field-label description-field">' .__( 'Description', GROUPS_PLUGIN_DOMAIN ) . '</label>' .
	'<textarea id="description-field" name="description-field" rows="5" cols="45">' . stripslashes( wp_filter_nohtml_kses( $description ) ) . '</textarea>' .
	'</div>' .
	
	'<div class="field">' .
	wp_nonce_field( 'capabilities-add', GROUPS_ADMIN_GROUPS_NONCE, true, false ) .
	'<input class="button" type="submit" value="' . __( 'Add', GROUPS_PLUGIN_DOMAIN ) . '"/>' .
	'<input type="hidden" value="add" name="action"/>' .
	'<a class="cancel" href="' . $current_url . '">' . __( 'Cancel', GROUPS_PLUGIN_DOMAIN ) . '</a>' .
	'</div>' .
	'</div>' . // .capability.new
	'</form>' .