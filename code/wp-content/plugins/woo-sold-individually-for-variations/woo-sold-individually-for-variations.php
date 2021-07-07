<?php
/**
 * Plugin Name: WooCommerce Sold Individually for Variations
 * Plugin URI: 
 * Description: This plugin allows you to apply the “Sold individually” WooCommerce product setting to the whole variable product (including its variations), thus not allowing the customer to buy more than one unit of the variable product, even if it’s a different variation. You can also set that a specific variation is “Sold individually”.
 * Version: 0.6
 * Author: Webdados
 * Author URI: https://www.webdados.pt
 * Text Domain: woo-sold-individually-for-variations
 * WC requires at least: 3.0
 * WC tested up to: 5.1.0
**/

/* WooCommerce CRUD ready */

namespace Webdados\WooSoldIndividuallyForVariations;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Localization */
add_action( 'plugins_loaded', __NAMESPACE__ . '\\load_textdomain', 0 );
function load_textdomain() {
	load_plugin_textdomain( 'woo-sold-individually-for-variations' );
}

/* Check if WooCommerce is active - Get active network plugins - "Stolen" from Novalnet Payment Gateway */
function active_network_plugins() {
	if ( !is_multisite() )
		return false;
	$activePlugins = ( get_site_option( 'active_sitewide_plugins' ) ) ? array_keys( get_site_option( 'active_sitewide_plugins' ) ) : array();
	return $activePlugins;
}
if ( in_array( 'woocommerce/woocommerce.php', (array) get_option( 'active_plugins' ) ) || in_array( 'woocommerce/woocommerce.php', (array) active_network_plugins() ) ) {

	/* Init the main class */
	add_action( 'plugins_loaded', __NAMESPACE__ . '\\init', 1 );
	function init() {
		if ( class_exists( 'WooCommerce' ) && version_compare( WC_VERSION, '3.0', '>=' ) ) { //We check again because WooCommerce could have "died" and now we can also check the its version
			require_once( dirname( __FILE__ ) . '/includes/class-woo-sold-individually-for-variations.php' );
			$GLOBALS['Woo_Sold_Individually_for_Variations'] = Woo_Sold_Individually_for_Variations();
		} else {
			add_action( 'admin_notices', __NAMESPACE__ . '\\admin_notices_woocommerce_not_active' );
		}
	}

	/* Get the main class instance */
	function Woo_Sold_Individually_for_Variations() {
		return \Woo_Sold_Individually_for_Variations::instance(); 
	}

} else {

	add_action( 'admin_notices', __NAMESPACE__ . '\\admin_notices_woocommerce_not_active' );

}

function admin_notices_woocommerce_not_active() {
	?>
	<div class="notice notice-error is-dismissible">
		<p><?php _e( '<strong>WooCommerce Sold Individually for Variations</strong> is installed and active but <strong>WooCommerce (3.0 or above)</strong> is not.', 'woo-sold-individually-for-variations' ); ?></p>
	</div>
	<?php
}

/* If you're reading this you must know what you're doing ;-) Greetings from sunny Portugal! */
