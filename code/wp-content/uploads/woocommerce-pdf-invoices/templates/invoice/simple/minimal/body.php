<?php
/**
 * PDF invoice template body.
 *
 * This template can be overridden by copying it to youruploadsfolder/woocommerce-pdf-invoices/templates/invoice/simple/yourtemplatename/body.php.
 *
 * HOWEVER, on occasion WooCommerce PDF Invoices will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @author  Bas Elbers
 * @package WooCommerce_PDF_Invoices/Templates
 * @version 0.0.1
 */

$templater                  = WPI()->templater();
$invoice                    = $templater->invoice;
$order                      = $invoice->order;
$line_items                 = $order->get_items( 'line_item' );
$formatted_shipping_address = $order->get_formatted_shipping_address();
$formatted_billing_address  = $order->get_formatted_billing_address();
$columns                    = $invoice->get_columns();
$color                      = $templater->get_option( 'bewpi_color_theme' );
$terms                      = $templater->get_option( 'bewpi_terms' );

$userInfo = [];

$userInfo['first_name']		= get_user_meta( $order->user_id, 'billing_first_name', true );
$userInfo['last_name']		= get_user_meta( $order->user_id, 'billing_last_name', true );
$userInfo['billing_phone']	= get_user_meta( $order->user_id, 'billing_phone', true );

?>

<!DOCTYPE html>
<html>
<body style="margin:0;font-family:system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
	<table style="width:100%; font-size: 12px;" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td style="width:10%">
					<img src="https://htschool.hindustantimes.com/wp-content/uploads/2021/05/inv_left_img.png" style="height: 1000px;">
				</td>
				<td valign="top" style="width:80%">
					<table style="width: 100%; padding-right: 10px; padding-left: 10px;">
						<tr>
							<td style="width:100%">
								<img src="https://htschool.hindustantimes.com/wp-content/uploads/2021/05/inv_header_logo.png">
							</td>
						</tr>
					</table>
					<table style="width: 100%; padding-right: 10px; padding-left: 10px; font-size: 14px; margin-top: 20px;">
						<tr>
							<td style="width: 50%; margin-bottom: 10px;">
								<span>Invoice To:</span>
							</td>
							<td style="width: 50%; margin-bottom: 10px; text-align: right;">
								<span>Order No: </span><span style="font-weight: bold;"><?php echo esc_html( $order->get_order_number() )?></span>
							</td>
						</tr>
						<tr>
							<td>
								<span style="font-weight: bold;"><?php echo $userInfo['first_name']." ".$userInfo['last_name']; ?></span>
							</td>
							<td style="width: 50%; text-align: right;">
								<span>Date: </span><span style="font-weight: bold;"><?php echo date("d/m/Y", strtotime($order->get_date_created()));?></span>
							</td>
						</tr>
					</table>
					<table style="width: 100%; padding-right: 10px; padding-left: 10px; font-size: 14px; margin-top: 20px;">
						<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr>
							<td style="width: 30%;">
								<span>Email</span>
							</td>
							<td colspan="2" style="width: 70%;">
								<span style="margin-right: 20px;">:&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<span style="font-weight: bold;"><?php echo $order->get_billing_email(); ?></span>
							</td>
						</tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr>
							<td style="width: 30%;">
								<span>Mobile</span>
							</td>
							<td colspan="2" style="width: 70%;">
								<span style="margin-right: 20px;">:&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<span style="font-weight: bold;"><?php echo $userInfo['billing_phone']; ?></span>
							</td>
						</tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr>
							<td style="width: 30%;">
								<span>Payment ID</span>
							</td>
							<td colspan="2" style="width: 70%;">
								<span style="margin-right: 20px;">:&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<span style="font-weight: bold;"><?php echo $order->get_transaction_id(); ?></span>
							</td>
						</tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr>
							<td style="width: 30%;">
								<span>Payment Mode</span>
							</td>
							<td colspan="2" style="width: 70%;">
								<span style="margin-right: 20px;">:&nbsp;&nbsp;&nbsp;&nbsp;</span>
								<span style="font-weight: bold;"><?php echo $order->get_payment_method(); ?></span>
							</td>
						</tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr>
							<td valign="top" style="width: 30%;">
								<span>Course/s Enrolled</span>
							</td>
							<td colspan="2" style="width: 70%;">
								<table style="width: 100%;">
									<?php $count=1;
									foreach ( $order->get_items() as $item_id => $item )
									{
										if($count > 1) { ?>
											<tr><td colspan="3" style="height: 10px;"></td></tr>
											<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
											<tr><td colspan="3" style="height: 10px;"></td></tr>
										<?php } ?>

										<tr>
											<td valign="top" style="width: 5%;">
												<span style="font-weight: bold;"><?php echo $count++; ?></span>
											</td>
											<td valign="top" style="width: 75%;">
												<p style="margin-bottom: 0px; margin-top: 0px;">Course</p>
												<span style="font-weight: bold;"><?php echo $item->get_name(); ?></span>
											</td>
											<td valign="bottom" style="width: 20%; text-align: right;">
												<span style="font-weight: bold;"><?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?></span>
											</td>
										</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>
						<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
						<tr><td colspan="3" style="height: 10px;"></td></tr>

						<?php $item_totals = $order->get_order_item_totals();

							if ( $item_totals ) {
								foreach ( $item_totals as $total )
								{ ?>
									<tr>
										<td style="width: 30%;">
											<span><?php echo wp_kses_post( $total['label'] ); ?></span>
										</td>
										<td style="width: 30%;">
											<span style="margin-right: 20px;">:</span>
										</td>
										<td style="width: 40%; text-align: right;">
											<span style="font-weight: bold;"><?php echo wp_kses_post( $total['value'] ); ?></span>
										</td>
									</tr>

									<tr><td colspan="3" style="height: 10px;"></td></tr>
									<tr><td colspan="3" style="border-top: 1px solid #707070;"></td></tr>
									<tr><td colspan="3" style="height: 10px;"></td></tr>
								<?php
								}
							}
						?>
						<tr>
							<td colspan="3">
								<span style="font-size:16px; color:#78A1C6;">Thank you for your payment</span>
							</td>
						</tr>
					</table>
					<table style="width: 100%; padding-right: 10px; padding-left: 10px;">
						<tr>
							<td valign="bottom">
								<img src="https://htschool.hindustantimes.com/wp-content/uploads/2021/05/inv_bottom_img.png" style="width: 550px;">
							</td>
						</tr>
					</table>
				</td>
				<td style="width:10%">
					<img src="https://htschool.hindustantimes.com/wp-content/uploads/2021/05/inv_right_img.png" style="height: 1000px;">
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>