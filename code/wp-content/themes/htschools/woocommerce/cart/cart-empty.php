<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */

 
if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<h2 class="ccart_heding">Your Cart</h2>
	<div class="empty_cart_div">
		<div class="empty_cart_image"></div>
		<h4>Oops! Your cart is empty</h4>
		<p class="return-to-shops">
			<a class="wc-backward empty_btn" href="<?php echo get_site_url();?>/courses">
				Add Courses
			</a>
		</p>
	</div>
	
<?php endif; ?>
