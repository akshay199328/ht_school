<?php
/*
Plugin Name: Celebrity School integration
Plugin URI: 
Version: 1.6.0
Author: Fortune4
Author URI: https://fortune4.in

*/


define('WPCS_JS_VERSION', "1.6.8");
define('WPCS_PATH', plugins_url() . '/celebrity-school-integration');
define('WPCS_META_KEY', "wpceleb_school");
define('WPFP_USER_OPTION_KEY', "wpceleb_useroptions");

// manage default privacy of users favorite post lists by adding this constant to wp-config.php
if ( !defined( 'WPFP_DEFAULT_PRIVACY_SETTING' ) )
    define( 'WPFP_DEFAULT_PRIVACY_SETTING', false );

$ajax_mode = 1;


function wpcs_config() { include('cs-admin.php'); }

function wpcs_config_page() {
    if ( function_exists('add_submenu_page') )
        add_options_page(__('Celeb school configuration'), __('Celeb School'), 'manage_options', 'wp-celeb-school', 'wpcs_config');
}
add_action('admin_menu', 'wpcs_config_page');
