<?php
class ANUIWP_Registration_Settings_Hooks {

	public function __construct(){       
		add_action('admin_init', array($this, 'registration_settings'));
	}

	function registration_settings_callback() { ?>
		<form action="options.php?tab=registration-settings" method="post">

			<?php settings_fields('anuiwp-registration-options'); ?>


			<div class="anuiwp-section">
				<?php do_settings_sections('anuiwp_registration_settings_section'); ?>
			</div>

			<div class="anuiwp-section">
				<?php do_settings_sections('anuiwp_pending_settings_section'); ?>
			</div>

			<div class="anuiwp-section">
				<?php do_settings_sections('anuiwp_reject_settings_section'); ?>
			</div>

			<?php
			submit_button('Save Settings');
			?>
		</form>
		<?php
	}
    
	/**
	 * Register registration settings
	 */
	public function registration_settings() {
		register_setting(
			'anuiwp-registration-options', 
			'anuiwp_registration_options', 
			array( 
				"sanitize_callback" => array($this, 'sanitize_settings')
			)
		);

		/** Registration notifications section start */
		add_settings_section(
			'anuiwp_registration_setting',
			__('Registration Notifications', 'approve-new-user'),
			array(),
			'anuiwp_registration_settings_section'
		);

		add_settings_field(
			'welcome_message',
			__('Welcome Message', 'approve-new-user'),
			array($this, 'textarea_field_html'),
			'anuiwp_registration_settings_section',
			'anuiwp_registration_setting',
			[
				'label_for' => 'welcome_message',
			]
		);

		add_settings_field(
			'registration_message',
			__('Registration Message', 'approve-new-user'),
			array($this, 'textarea_field_html'),
			'anuiwp_registration_settings_section',
			'anuiwp_registration_setting',
			[
				'label_for' => 'registration_message',
			]
		);

		add_settings_field(
			'registration_complete_message',
			__('Registration complete Message', 'approve-new-user'),
			array($this, 'textarea_field_html'),
			'anuiwp_registration_settings_section',
			'anuiwp_registration_setting',
			[
				'label_for' => 'registration_complete_message',
			]
		);

		/** Pending notifications section start */
		add_settings_section(
			'anuiwp_pending_setting',
			__('Pending Notifications', 'approve-new-user'),
			array(),
			'anuiwp_pending_settings_section'
		);

		add_settings_field(
			'pending_error_message',
			__('Pending error Message', 'approve-new-user'),
			array($this, 'textarea_field_html'),
			'anuiwp_pending_settings_section',
			'anuiwp_pending_setting',
			[
				'label_for' => 'pending_error_message',
			]
		);

		/** Reject notifications section start */
		add_settings_section(
			'anuiwp_reject_setting',
			__('Reject Notifications', 'approve-new-user'),
			array(),
			'anuiwp_reject_settings_section'
		);

		add_settings_field(
			'reject_error_message',
			__('Reject error Message', 'approve-new-user'),
			array($this, 'textarea_field_html'),
			'anuiwp_reject_settings_section',
			'anuiwp_reject_setting',
			[
				'label_for' => 'reject_error_message',
			]
		);
	}

	public function textarea_field_html($args){
		$anuiwp_registration_options = anuiwp_registration_options();
		$value = isset($anuiwp_registration_options[$args['label_for']]) ? $anuiwp_registration_options[$args['label_for']] : '';
		?>
			<textarea name="anuiwp_registration_options[<?php esc_attr_e( $args['label_for'] ); ?>]" id="<?php esc_attr_e( $args['label_for'] ); ?>" class="anuiwp_content"><?php echo wp_unslash($value); ?></textarea>
		<?php
	}

	public function sanitize_settings($input) {
		$new_input = array();

		if (isset($input['welcome_message'])) {
			$new_input['welcome_message'] = htmlentities($input['welcome_message']);
		}

		if (isset($input['registration_message'])) {
			$new_input['registration_message'] = htmlentities($input['registration_message']);
		}

		if (isset($input['registration_complete_message'])) {
			$new_input['registration_complete_message'] = htmlentities($input['registration_complete_message']);
		}

		if (isset($input['pending_error_message'])) {
			$new_input['pending_error_message'] = htmlentities($input['pending_error_message']);
		}

		if (isset($input['reject_error_message'])) {
			$new_input['reject_error_message'] = htmlentities($input['reject_error_message']);
		}

		return $new_input;
	}
    
}