<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style type="text/css">
		body{margin:0;padding:0;font-family:-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-size:14px;line-height:1.5;}
		.main{max-width:700px;margin:auto;}
		header{background-color:#FADE3B;padding:15px 20px;display:flex;justify-content:space-between;align-items:center;}
		header span{font-size:25px;text-transform:uppercase;letter-spacing:.6px;font-weight:600;margin-left:auto;}
		.content{padding:20px 20px 0 20px;}
		.content .data span{display: inline-block;padding:5px 8px;border:1px dotted black;}
		p{margin-top:0}
		table{width:100%;margin-bottom:20px}
		table th{font-weight:600;}
		table a{color:#0C5ACC;}
		table td{border-bottom:1px dotted #000}
	</style>
</head>
<body>
	<div class="main">
		<header>
			<a href="#!"><img src="<?php echo bloginfo('template_url') ?>/assets/images/invoice-logo.png" height="34"></a>
			<span>Invoice</span>
		</header>
		<div class="content">
			<p>Hi,<br>Just to let you know - we’ve received your order, and it is now being processed:</p>
			<p class="data">
				<span>Order: <?php echo esc_html( $order->get_order_number() )?></span>
				<span>Date: <?php echo wc_format_datetime($order->get_date_created());?></span>
			</p>
			<table cellpadding="0" cellspacing="0">
				<thead>
				<tr>
					<th align="left" style="background-color:#DEF8FF;padding:10px 18px;">Prodcut</th>
					<th align="right" style="background-color:#DEF8FF;padding:10px 18px;">Quantity</th>
					<th align="right" style="background-color:#DEF8FF;padding:10px 18px;">Price</th>
				</tr>
				</thead>
				<tbody>
					<?php
						foreach ( $order->get_items() as $item_id => $item ) :
							$product       = $item->get_product();
							$sku           = '';
							$purchase_note = '';
							$image         = '';
						if ( is_object( $product ) ) {
							$sku           = $product->get_sku();
							$purchase_note = $product->get_purchase_note();
							$image         = $product->get_image( $image_size );
						}?>
						<tr>
							<td style="padding:10px 18px;">
								<span style="font-size:12px;vertical-align:middle;text-transform:uppercase;letter-spacing:.6px;display:block;">Course</span>
								<a href="#!"><?php echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ) ); ?></a>
							</td>
							<td style="padding:10px 18px;" align="right"><?php
								$qty          = $item->get_quantity();
								$refunded_qty = $order->get_qty_refunded_for_item( $item_id );

								if ( $refunded_qty ) {
									$qty_display = '<del>' . esc_html( $qty ) . '</del> <ins>' . esc_html( $qty - ( $refunded_qty * -1 ) ) . '</ins>';
								} else {
									$qty_display = esc_html( $qty );
								}
								echo wp_kses_post( apply_filters( 'woocommerce_email_order_item_quantity', $qty_display, $item ) );
								?>
							</td>
							<td style="padding:10px 18px;" align="right"><?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?></td>
						</tr>
						<?php
							endforeach;
						?>
						<?php
						$item_totals = $order->get_order_item_totals();

						if ( $item_totals ) {
							$i = 0;
							foreach ( $item_totals as $total ) {
								$i++;
								?>
								<tr>
									<td style="padding:10px 18px;"><span class="subtotal"><?php echo wp_kses_post( $total['label'] ); ?></span></td>
									<td style="padding:10px 18px;"></td>
									<td class="subtotal" style="padding:10px 18px;"><?php echo wp_kses_post( $total['value'] ); ?></td>
								</tr>
								<?php
							}
						}
					?>
				</tbody>
			</table>
			<strong style="padding-left:20px">Billing Address</strong>
			<div style="padding:10px 20px;background-color:#F5F5F5;margin:10px 0 20px 0">
				<div class="gray-bg">
					<p style="margin:0px;font-size: 14px;"><?php echo wp_kses_post( $address ? $address : esc_html__( 'N/A', 'woocommerce' ) ); ?>
					<?php if ( $order->get_billing_phone() ) : ?>
						<br/><?php echo wc_make_phone_clickable( $order->get_billing_phone() ); ?>
					<?php endif; ?></p>
					<p style="margin:0px;font-size: 14px;"><?php if ( $order->get_billing_email() ) : ?>
						<br/><?php echo esc_html( $order->get_billing_email() ); ?>
					<?php endif; ?></p>
				</div>
			</div>
			<p style="font-size:18px;color:#0087FF;font-weight:600;margin-bottom:0">Thank you for your order</p>
		</div>
		<img src="<?php echo bloginfo('template_url')?>/assets/img/invoice-bottom.png" width="100%">
	</div>
</body>
</html>

