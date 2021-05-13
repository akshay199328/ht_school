<?php
/*
Plugin Name: AIWS integration
Plugin URI:
Version: 1.0.0
Author: Fortune4
Author URI: https://fortune4.in

*/


define('WPAIWS_PATH', plugins_url() . '/aiws-school-integration');
define('WPAIWS_META_KEY', "wp_aiws_school");
define('WPFP_USER_OPTION_KEY', "wp_aiws_useroptions");

function wpaiws_config() { include('aiws-admin.php'); }

function wpaiws_config_page() {
    if ( function_exists('add_submenu_page') )
        add_options_page(__('AIWS Configuration'), __('AIWS School'), 'manage_options', 'wp-aiws-school', 'wpaiws_config');
}
add_action('admin_menu', 'wpaiws_config_page');
