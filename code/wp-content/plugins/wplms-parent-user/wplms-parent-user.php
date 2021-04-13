<?php
/*
Plugin Name: WPLMS Parent User
Plugin URI: https://wplms.io
Description: Parent User Module for WPLMS
Version: 4.1
Author: VibeThemes
Author URI: http://www.wplms.io
Text Domain: wplms-parent-user
Domain Path: /languages/
*/
if ( !defined( 'ABSPATH' ) ) exit; 
/*  Copyright 2013 VibeThemes  (email: vibethemes@gmail.com) */


define('WPLMS_PARENT_USER_VERSION','4.1');


if(!defined('WPLMS_PARENT_USER_SCRIPT_VERSION'))
    define('WPLMS_PARENT_USER_SCRIPT_VERSION','4.1');


if(!defined('WPLMS_PARENT_USER_API_NAMESPACE'))
    define('WPLMS_PARENT_USER_API_NAMESPACE','parentuser/v1');


if ( ! defined( 'WPLMS_PARENT_USER_SLUG' ) )
	define( 'WPLMS_PARENT_USER_SLUG', 'parent_user' );



include_once 'includes/class.updater.php';
include_once 'includes/class.config.php';
include_once 'includes/class.parent_dashboard.php';
include_once 'includes/class.admin.php';
include_once 'includes/functions.php';
include_once 'includes/class.init.php';
//include_once 'classes/bp_add_nav_children_class.php';
include_once 'includes/class.wplms_parent_user.php'; // react
include_once 'includes/class.api.php';

add_action('plugins_loaded','wplms_parent_user_translations');
function wplms_parent_user_translations(){
    $locale = apply_filters("plugin_locale", get_locale(), 'wplms-parent-user');
    $lang_dir = dirname( __FILE__ ) . '/languages/';
    $mofile        = sprintf( '%1$s-%2$s.mo', 'wplms-parent-user', $locale );
    $mofile_local  = $lang_dir . $mofile;
    $mofile_global = WP_LANG_DIR . '/plugins/' . $mofile;

    if ( file_exists( $mofile_global ) ) {
        load_textdomain( 'wplms-parent-user', $mofile_global );
    } else {
        load_textdomain( 'wplms-parent-user', $mofile_local );
    }  
}


function Wplms_parent_user_Plugin_updater() {
    $license_key = trim( get_option( 'wplms_parent_user_license_key' ) );
    $edd_updater = new Wplms_parent_user_Plugin_Updater( 'https://wplms.io', __FILE__, array(
            'version'   => '1.1',               
            'license'   => $license_key,        
            'item_name' => 'WPLMS Parent User',    
            'author'    => 'VibeThemes' 
        )
    );
}
add_action( 'admin_init', 'Wplms_parent_user_Plugin_updater', 0 );
