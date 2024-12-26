<?php

if (!defined('ABSPATH')) exit;

/**
 * License manager module
 */
function anuiwp_updater_utility() {
    $prefix = 'ANUIWP_';
    $settings = [
        'prefix' => $prefix,
        'get_base' => ANUIWP_PLUGIN_BASENAME,
        'get_slug' => ANUIWP_PLUGIN_DIR,
        'get_version' => ANUIWP_VERSION,
        'get_api' => 'https://download.geekcodelab.com/',
        'license_update_class' => $prefix . 'Update_Checker'
    ];

    return $settings;
}

function anuiwp_updater_activate() {

    // Refresh transients
    delete_site_transient('update_plugins');
    delete_transient('anuiwp_plugin_updates');
    delete_transient('anuiwp_plugin_auto_updates');
}

require_once(ANUIWP_PLUGIN_DIR_PATH . 'updater/class-update-checker.php');
