

	<form id="add-capability" action="<?php echo $current_url ?>" method="post">
		<div class="capability new">

			<div class="field">
				<label for="name-field" class="field-label first required">
					组名
				</label>
				<input id="name-field" name="name-field" class="namefield" type="text" value="<?php echo esc_attr( stripslashes( $name ) ) ?>"/>
			</div>

			<div class="field">
				<label for="slogon-field" class="field-label first required">
					筹款宣言
				</label>
				<input id="slogon-field" name="slogon-field" class="slogonfield" type="text" value="<?php echo esc_attr( stripslashes( $slogon ) ) ?>"/>
			</div>

			<div class="field">
				<label for="goal-field" class="field-label first required">
					筹款目标
				</label>
				<input id="goal-field" name="goal-field" class="goalfield" type="text" value="<?php echo esc_attr( stripslashes( $goal ) ) ?>"/>
			</div>

			<div class="field">
				<label for="description-field" class="field-label description-field">
					描述
				</label>
				<textarea id="description-field" name="description-field" rows="5" cols="45"> 
				<?php echo esc_attr( stripslashes( $description ) ) ?>
				</textarea>
			</div>

			<div class="field">
				<?php wp_nonce_field( 'capabilities-add', GROUPS_ADMIN_GROUPS_NONCE, true, false ) ?>
				<input class="button" type="submit" value="<?php  echo  __( 'Add', GROUPS_PLUGIN_DOMAIN ) ?>"/>
				<input type="hidden" value="add" name="action"/>
				<a class="cancel" href="<?php echo($current_url); ?>">
				 <?php echo __( 'Cancel', GROUPS_PLUGIN_DOMAIN ) ?>
				</a>
			</div>
		</div>
	</form>