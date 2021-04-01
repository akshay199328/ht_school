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
	<div class="empty_cart_div">
		<div class="empty_cart_image"></div>
		<h4>Oops!<br>Your cart is Empty</h4>
		<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
	</div>
	<p class="return-to-shops">
		<a class="button wc-backward" href="<?php echo get_site_url();?>/courses">
			Add Courses
		</a>
	</p>
<?php endif; ?>
