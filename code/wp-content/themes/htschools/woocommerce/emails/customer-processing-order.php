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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <!--[if gte mso 9]>
            <xml>
                <o:OfficeDocumentSettings><o:AllowPNG /><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings>
            </xml>
        <![endif]-->
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta content="width=device-width" name="viewport" />
        <!--[if !mso]><!-->
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <!--<![endif]-->
        <title></title>
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
        <!--<![endif]-->
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
				font-family: Arial;
            }

            table,
            td,
            tr {
                vertical-align: top;
                border-collapse: collapse;
            }

            * {
                line-height: inherit;
            }

            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
			.product-table{text-align: left;width:100%}
			.product-table th{padding: 10px 14px;width: 190px;font-size: 12px}
			.product-table td{padding: 11px 14px;width: 190px;font-size: 12px}
			.border-line{border-bottom: 1px dotted #ddd;}
			.border-dark{border-top:1px solid #707070;border-bottom:1px solid #707070}
			.course-title{display:block;margin-bottom: 3px;}
			.course-name{color:#0C5ACC}
			.subtotal{font-size: 12px;font-weight:700;font-family: Arial;}
			.billing-address{padding-top: 20px;}
			.billing-address .gray-bg{background-color: #eee;padding: 15px;}
			.list{list-style-type: none;padding: 0;margin: 0 0 20px 0;display: flex;}
			.list td a{font-size: 14px;color:#000;text-decoration: none;}
			.list td{border: 1px dotted #707070;padding: 10px;margin-right: 12px;}
			.black{font-weight:700}
			.order-title{    margin-right: 5px;font-weight: 500;}
			.yellow-patch{    
				position: absolute;
			    top: 0;
			    width: 15%;
			    height: 59%;
			    background-color: #fade3b;
			    writing-mode: tb-rl;
			}
			.yellow-patch h1{margin: 0;
				text-align: left;
    padding: 43px 17px 11px 6px;
			font-size: 60px;
			font-weight: 500;
	
			letter-spacing: 14px;}

			.black-patch{
				position: absolute;
			    background-color: #000;
			    width: 8%;
			    height: 41%;
			    bottom: 0;
			    writing-mode: tb-rl;
		}
		.black-patch h4{color: #fff;
    letter-spacing: 2px;
    font-size: 16px;
    margin: 0;
    text-align: center;
    padding: 18px 14px 18px 16px;}
		.sky-blue{
			background-color: #D5EBFF;height: 30%;position: absolute;top:0;width:39px;    right: 0;
		}
		.blue-patch{height:70%;width:60px;background-color: #78A1C6;position: absolute;bottom:0;right:0}


        </style>
        <style id="media-query" type="text/css">

            @media (max-width: 640px) {
                .block-grid,
                .col {
                    min-width: 320px !important;
                    max-width: 100% !important;
                    display: block !important;
                }

                .block-grid {
                    width: 100% !important;
                }

                .col {
                    width: 100% !important;
                }

                .col_cont {
                    margin: 0 auto;
                }

                img.fullwidth,
                img.fullwidthOnMobile {
                    max-width: 100% !important;
                }

                .no-stack .col {
                    min-width: 0 !important;
                    display: table-cell !important;
                }

                .no-stack.two-up .col {
                    width: 50% !important;
                }

                .no-stack .col.num2 {
                    width: 16.6% !important;
                }

                .no-stack .col.num3 {
                    width: 25% !important;
                }

                .no-stack .col.num4 {
                    width: 33% !important;
                }

                .no-stack .col.num5 {
                    width: 41.6% !important;
                }

                .no-stack .col.num6 {
                    width: 50% !important;
                }

                .no-stack .col.num7 {
                    width: 58.3% !important;
                }

                .no-stack .col.num8 {
                    width: 66.6% !important;
                }

                .no-stack .col.num9 {
                    width: 75% !important;
                }

                .no-stack .col.num10 {
                    width: 83.3% !important;
                }

                .video-block {
                    max-width: none !important;
                }

                .mobile_hide {
                    min-height: 0px;
                    max-height: 0px;
                    max-width: 0px;
                    display: none;
                    overflow: hidden;
                    font-size: 0px;
                }

                .desktop_hide {
                    display: block !important;
                    max-height: none !important;
                }
            }
        </style>
        <style id="icon-media-query" type="text/css">
            @media (max-width: 640px) {
                .icons-inner {
                    text-align: center;
                }

                .icons-inner td {
                    margin: 0 auto;
                }
            }
        </style>
    </head>
    
    <body class="clean-body" style="margin: 0px auto;max-width: 58%;">
        <!--[if IE]><div class="ie-browser"><![endif]-->
        <table
           
            cellpadding="0"
            cellspacing="0"
            class="nl-container"
            role="presentation"
            style="padding: 0;position: relative; -webkit-text-size-adjust: 100%;
            background-image: url('<?php echo get_bloginfo('template_url')?>/assets/images/bg12-svg.jpg')   background-size: cover;
    background-repeat: no-repeat;
    max-width: 97%;
    background-position: top;
    table-layout: fixed;
    vertical-align: bottom;
    min-width: 93%;height: 915px;
    border-spacing: 0;
    border-collapse: collapse;
    width: 100%;"
            valign="top"
            width="100%" class="image_table" style=""
        >
            <tbody>
                <tr style="vertical-align: top;" valign="top">
                    <td style="word-break: break-word; vertical-align: top;" valign="top">
						<div>
								<!-- <div class="yellow-patch" style="writing-mode: tb-rl;">
									<h1 style="transform: rotate(180deg);">INVOICE</h1>
								</div>
								<div class="black-patch" style="writing-mode: tb-rl;">
									<h4 style="transform: rotate(180deg);">LEARNING FOR EVERYONE</h4>
								</div>
								<div style="font-family: Arial; font-size: 35px; color: #000; font-weight: bold; text-align: center; padding-bottom: 50px; margin-bottom: 0; margin-top: 0;"></div>
								<div style="height:70%;width:60px;background-color: #78A1C6;position: absolute;bottom:0;right:0"></div> -->

								<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
								<div style="padding: 20px 76px 86px 106px;">
									<table>
										<tr>
											<td>
												<img src="https://ht.fortune4.org/wp-content/uploads/2021/04/Header-logo-big_Web.png" />
											</td>
										</tr>
										<tr>
											<td style="font-size: 14px;font-family: Arial;line-height: 21px;">
												<p >Hi,<br> Just to let you know - we’ve received your order, and it is now being processed:</p>
											</td>
										</tr>
									
									<!-- <div>
										<img src="https://ht.fortune4.org/wp-content/uploads/2021/04/Header-logo-big_Web.png" />
									</div>
									<div>
										<p style="font-size: 14px;font-family: Arial;line-height: 21px;">Hi,<br> Just to let you know - we’ve received your order, and it is now being processed:</p>
									</div> -->
									<tr class="list">
										<td>
											<a href="#">
												<span class="order-title">ORDER #:</span> <span class="black"><?php echo esc_html( $order->get_order_number() )?></span>
											</a>
										</td>
										<td>
											<a href="">
												<span class="order-title">Date :</span> <span class="black"><?php echo wc_format_datetime($order->get_date_created());?></span>
											</a>
										</td>
									</tr>
									</table>
									<div>
										<table class="product-table" style="text-align:left;width:100%">
											<tr style="background-color: #DEF8FF;font-family: Arial;">
												<th style="width:50%">Product</th>
												<th style="width:20%;text-align: right;">Quality</th>
												<th style="width:30%;text-align: right;">Price</th>
											</tr>
											<!-- <tr class="border-line" style="font-family: Arial;">
												<td style="width:50%">
													<span class="course-title">COURSE:</span> 
													<a href="#" class="course-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></a></td>
												<td style="width:20%;text-align: right;"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></td>
												<td style="width:30%;text-align: right;"><?php esc_html_e( 'Price', 'woocommerce' ); ?></td>
											</tr> -->
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
												<tr class="border-line" style="font-family: Arial;">
													<td style="width:50%">
														<span class="course-title">COURSE:</span> 
														<a href="#" class="course-name"><?php echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', $item->get_name(), $item, false ) ); ?></a></td>
													<td style="width:20%;text-align: right;"><?php
														$qty          = $item->get_quantity();
														$refunded_qty = $order->get_qty_refunded_for_item( $item_id );

														if ( $refunded_qty ) {
															$qty_display = '<del>' . esc_html( $qty ) . '</del> <ins>' . esc_html( $qty - ( $refunded_qty * -1 ) ) . '</ins>';
														} else {
															$qty_display = esc_html( $qty );
														}
														echo wp_kses_post( apply_filters( 'woocommerce_email_order_item_quantity', $qty_display, $item ) );
														?></td>
													<td style="width:30%;text-align: right;"><?php echo wp_kses_post( $order->get_formatted_line_subtotal( $item ) ); ?></td>
												</tr>
												<?php
												endforeach;
												?>
											</tbody>
											<?php
												$item_totals = $order->get_order_item_totals();

												if ( $item_totals ) {
													$i = 0;
													foreach ( $item_totals as $total ) {
														$i++;
														?>
														<tr class="border-dark" style="font-family: Arial;">
															<td style="width:50%"><span class="subtotal"><?php echo wp_kses_post( $total['label'] ); ?></span></td>
															<td style="width:20%;text-align: right;"></td>
															<td class="subtotal" style="width:30%;text-align: right;"><?php echo wp_kses_post( $total['value'] ); ?></td>
														</tr>
														<?php
													}
												}
											?>
										</table>
										<div class="billing-address">
											<h4 style="font-size: 14px;margin-bottom: 5px;">Billing Address</h4>
											<div class="gray-bg">
												<p style="margin:0px;font-size: 14px;"><?php echo wp_kses_post( $address ? $address : esc_html__( 'N/A', 'woocommerce' ) ); ?>
												<?php if ( $order->get_billing_phone() ) : ?>
													<br/><?php echo wc_make_phone_clickable( $order->get_billing_phone() ); ?>
												<?php endif; ?></p>
												<p style="margin:0px;font-size: 14px;"><?php if ( $order->get_billing_email() ) : ?>
													<br/><?php echo esc_html( $order->get_billing_email() ); ?>
												<?php endif; ?></p>
											</div>
											<h2 style="color:#78A1C6;font-size: 18px;margin-top:10px;">Thank you for your order</h2>
										</div>
									</div>
									<table>
										<tr style="background-image: url('<?php echo get_bloginfo('template_url')?>/assets/images/invoice-footer.png');    background-size: cover;
									    background-repeat: no-repeat;
									    max-width: 97%;">
											
										</tr>
									</table>
								</div>
								
								<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
						</div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if (IE)]></div><![endif]-->
    </body>
</html>

