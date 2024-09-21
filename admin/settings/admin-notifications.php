<?php
class ANUIWP_Admin_Notifications_Settings_Hooks {

	public function __construct(){       
		add_action('admin_init', array($this, 'admin_notifications_settings'));
	}

	function admin_notifications_callback() {?>
		<form action="options.php?tab=wspc-product-description" method="post">

			<?php settings_fields('anuiwp-admin-notifications-options'); ?>


			<div class="anuiwp-section">
				<?php do_settings_sections('anuiwp_admin_notifications_settings_section'); ?>
			</div>

			<div class="anuiwp-section">
				<?php do_settings_sections('anuiwp_admin_notification_email_section'); ?>
			</div>

			<?php
			submit_button('Save Settings');
			?>
		</form>
		<?php
	}

	/**
	 * Register admin notifications settings
	 */
	public function admin_notifications_settings() {
		register_setting('anuiwp-admin-notifications-options', 'anuiwp_admin_notifications_options', array($this, 'sanitize_settings'));

		/** Notification options section start */
		add_settings_section(
			'anuiwp_admin_notifications_setting',
			__('Notification options', 'approve-new-user'),
			array(),
			'anuiwp_admin_notifications_settings_section'
		);

		add_settings_field(
			'send_notifications_emails_to_all_admin',
			__('Send notification emails to all admins', 'approve-new-user'),
			array($this, 'switch_field_html'),
			'anuiwp_admin_notifications_settings_section',
			'anuiwp_admin_notifications_setting',
			[
				'label_for' => 'send_notifications_emails_to_all_admin',
			]
		);

		add_settings_field(
			'dont_send_notifications_to_admin',
			__("Don't send notification emails to current site admin", 'approve-new-user'),
			array($this, 'switch_field_html'),
			'anuiwp_admin_notifications_settings_section',
			'anuiwp_admin_notifications_setting',
			[
				'label_for' => 'dont_send_notifications_to_admin',
			]
		);

		/** Notification Emails section start */
		add_settings_section(
			'anuiwp_admin_notification_email',
			__('Notification Emails', 'approve-new-user'),
			array(),
			'anuiwp_admin_notification_email_section'
		);

		add_settings_field(
			'admin_notification_subject',
			__('Notification Email Subject', 'approve-new-user'),
			array($this, 'text_field_html'),
			'anuiwp_admin_notification_email_section',
			'anuiwp_admin_notification_email',
			[
				'label_for' => 'admin_notification_subject',
			]
		);
		
		add_settings_field(
			'admin_notification_message',
			__('Notification Email Message', 'approve-new-user'),
			array($this, 'textarea_field_html'),
			'anuiwp_admin_notification_email_section',
			'anuiwp_admin_notification_email',
			[
				'label_for' => 'admin_notification_message',
			]
		);
	}

	public function switch_field_html($args){
		$anuiwp_admin_notifications_options = anuiwp_admin_notifications_options();
		$value = isset($anuiwp_admin_notifications_options[$args['label_for']]) ? $anuiwp_admin_notifications_options[$args['label_for']] : '';
		?>
		<label class="anuiwp-switch">
			<input type="checkbox" class="anuiwp-checkbox" name="anuiwp_admin_notifications_options[<?php esc_attr_e( $args['label_for'] ); ?>]" id="<?php esc_attr_e( $args['label_for'] ); ?>" value="on" <?php if($value == "on"){ _e('checked'); } ?>>
			<span class="anuiwp-slider anuiwp-round"></span>
		</label>
		<?php
	}

	public function text_field_html($args){
		$anuiwp_admin_notifications_options = anuiwp_admin_notifications_options();
		$value = isset($anuiwp_admin_notifications_options[$args['label_for']]) ? $anuiwp_admin_notifications_options[$args['label_for']] : '';
		?>
		<input type="text" name="anuiwp_admin_notifications_options[<?php esc_attr_e( $args['label_for'] ); ?>]" id="<?php esc_attr_e( $args['label_for'] ); ?>" value="<?php _e($value); ?>">
		<?php
	}
	
	public function textarea_field_html($args){
		$anuiwp_admin_notifications_options = anuiwp_admin_notifications_options();
		$value = isset($anuiwp_admin_notifications_options[$args['label_for']]) ? $anuiwp_admin_notifications_options[$args['label_for']] : '';
		?>
		<textarea name="anuiwp_admin_notifications_options[<?php esc_attr_e( $args['label_for'] ); ?>]" id="<?php esc_attr_e( $args['label_for'] ); ?>" class="anuiwp_content"><?php echo wp_unslash($value); ?></textarea>
		<?php
	}

	public function sanitize_settings($input) {
		$new_input = array();

		if (isset($input['send_notifications_emails_to_all_admin'])) {
			$new_input['send_notifications_emails_to_all_admin'] = sanitize_text_field($input['send_notifications_emails_to_all_admin']);
		}

		if (isset($input['dont_send_notifications_to_admin'])) {
			$new_input['dont_send_notifications_to_admin'] = sanitize_text_field($input['dont_send_notifications_to_admin']);
		}

		if (isset($input['admin_notification_subject'])) {
			$new_input['admin_notification_subject'] = sanitize_text_field($input['admin_notification_subject']);
		}

		if (isset($input['admin_notification_message'])) {
			$new_input['admin_notification_message'] = htmlentities($input['admin_notification_message']);
		}

		return $new_input;
	}
}