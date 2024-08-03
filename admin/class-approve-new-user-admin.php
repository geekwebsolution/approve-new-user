<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 */
class Approve_New_User_Admin {
	/**
	 * The version of this plugin.
	 */
	private $version;

	/**
	 * The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The current plugin dir of the plugin.
	 */
	protected $get_plugin_dir;

	/**
	 * The current settings of the plugin.
	 */
	protected $settings;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct( $settings ) {
		$this->version = $settings['version'];
		$this->plugin_name = $settings['plugin_name'];
		$this->get_plugin_dir = $settings['get_plugin_dir'];

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		
	}

}