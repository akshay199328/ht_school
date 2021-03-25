<?php
/**
 * Plugin Name: WooCommerce GST
 * Description: WooCommerce addon for GST.
 * Author: Stark Digital
 * Author URI: https://www.starkdigital.net
 * Version: 1.3
 * Plugin URI: https://www.woocommercegst.co.in
 * WC requires at least: 3.0.0
 * WC tested up to: 4.8.0
 */

if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}
require_once('inc/functions.php');
/**
 * Check WooCommerce exists
 */
if ( fn_is_woocommerce_active() ) {
	define('gst_RELATIVE_PATH', plugin_dir_url( __FILE__ ));
	define('gst_ABS_PATH', plugin_dir_path(__FILE__));
	define( 'gst_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
	define( 'gst_BASENAME', plugin_basename(__FILE__) );
	define( 'GST_PRO_LINK', 'https://www.woocommercegst.co.in/?utm_source=wordpress&utm_medium=plugin_notice');
	
	require_once( 'class-gst-woocommerce-addon.php' );

	$gst_settings = new WC_GST_Settings();
	$gst_settings->init();

} else {
	add_action( 'admin_notices', 'fn_gst_admin_notice__error' );
}