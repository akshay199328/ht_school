<?php
/**
 * Checkout Order Receipt Template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/order-receipt.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<div class="order_details_page">
	<h2 class="cart_heading">Order details</h2>
	<div class="table-responsive">
	<table cellspacing="0" class="shop_table shop_table_responsive order-pay">

		<tbody><tr class="cart-subtotal">
			<th><?php esc_html_e( 'Order number:', 'woocommerce' ); ?></th>
			<th><?php esc_html_e( 'Date:', 'woocommerce' ); ?></th>
			<th><?php esc_html_e( 'Total:', 'woocommerce' ); ?></th>
			<th><?php esc_html_e( 'Payment method:', 'woocommerce' ); ?></th>
		</tr>
		<tr class="order-total">
			<th><?php echo esc_html( $order->get_order_number() ); ?></th>
			<th><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?>
			<th><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></th>
			<th><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></th>
		</strong></th>
	</tr>

	
	</tbody>
</table>
</div>

<div class="order_details_button customOrder_details">
	<?php do_action( 'woocommerce_receipt_' . $order->get_payment_method(), $order->get_id() ); ?>
</div>
</div>



<!-- <ul class="order_details">
	<li class="order">
		<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
		
		<strong><?php echo esc_html( $order->get_order_number() ); ?></strong>
	</li>
	<li class="date">
		<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
		
		<strong><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></strong>
	</li>
	<li class="total">
		<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
		
		<strong><?php echo wp_kses_post( $order->get_formatted_order_total() ); ?></strong>
	</li>
	<?php if ( $order->get_payment_method_title() ) : ?>
		<li class="method">
			<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
			
			<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
		</li>
	<?php endif; ?>
</ul> -->



<div class="clear"></div>
