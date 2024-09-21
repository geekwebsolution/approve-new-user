<?php
$anuiwp_general_options = get_option('anuiwp_general_options');

class ANUIWP_General_Settings_Hooks {

	public function __construct(){       
		add_action('admin_init', array($this, 'general_settings'));
	}

	function general_settings_callback() { ?>
		<form action="options.php" method="post">

			<?php settings_fields('anuiwp-general-options'); ?>

			<div class="wspc-section">				
				<?php do_settings_sections('anuiwp_general_settings_section'); ?>
			</div>

			<?php
			submit_button('Save Settings');
			?>
		</form>
		<?php
	}
    
	/**
	 * Register general settings
	 */
	public function general_settings() {
		register_setting('anuiwp-general-options', 'anuiwp_general_options', array($this, 'sanitize_settings'));

		/** General settings section start */
		add_settings_section(
			'anuiwp_general_setting',
			__('General Settings', 'approve-new-user'),
			array(),
			'anuiwp_general_settings_section'
		);

		add_settings_field(
			'hide_dashboard_stats',
			__('Hide Dashboard Stats', 'approve-new-user'),
			array($this, 'switch_field_html'),
			'anuiwp_general_settings_section',
			'anuiwp_general_setting',
			[
				'label_for'     => 'hide_dashboard_stats',
			]
		);

		add_settings_field(
			'hide_legacy_panel',
			__('Hide legacy panel', 'approve-new-user'),
			array($this, 'switch_field_html'),
			'anuiwp_general_settings_section',
			'anuiwp_general_setting',
			[
				'label_for'     => 'hide_legacy_panel',
			]
		);

		add_settings_field(
			'change_the_sender_email',
			__('Change the Admin/Sender Email', 'approve-new-user'),
			array($this, 'text_field_html'),
			'anuiwp_general_settings_section',
			'anuiwp_general_setting',
			[
				'label_for' => 'change_the_sender_email',
				'placeholder' => get_option( 'admin_email' )
			]
		);
	}

	public function switch_field_html($args){
		global $anuiwp_general_options;
		$value = isset($anuiwp_general_options[$args['label_for']]) ? $anuiwp_general_options[$args['label_for']] : '';
		?>
		<label class="anuiwp-switch">
			<input type="checkbox" class="anuiwp-checkbox" name="anuiwp_general_options[<?php esc_attr_e( $args['label_for'] ); ?>]" id="<?php esc_attr_e( $args['label_for'] ); ?>" value="on" <?php if($value == "on"){ _e('checked'); } ?>>
			<span class="anuiwp-slider anuiwp-round"></span>
		</label>
		<?php
	}

	public function text_field_html($args){
		global $anuiwp_general_options;
		$value = isset($anuiwp_general_options[$args['label_for']]) ? $anuiwp_general_options[$args['label_for']] : '';
		?>
		<input type="text" name="anuiwp_general_options[<?php esc_attr_e( $args['label_for'] ); ?>]" id="<?php esc_attr_e( $args['label_for'] ); ?>" value="<?php _e($value); ?>" placeholder="<?php esc_attr_e( isset($args['placeholder']) ? $args['placeholder'] : "" ); ?>">
		<?php
	}

	public function sanitize_settings($input) {
		$new_input = array();

		if (isset($input['hide_sale_flash'])) {
			$new_input['hide_sale_flash'] = sanitize_text_field($input['hide_sale_flash']);
		}

		if (isset($input['hide_add_to_cart'])) {
			$new_input['hide_add_to_cart'] = sanitize_text_field($input['hide_add_to_cart']);
		}

		if (isset($input['sale_flash_label'])) {
			$new_input['sale_flash_label'] = sanitize_text_field($input['sale_flash_label']);
		}

		return $new_input;
	}
}