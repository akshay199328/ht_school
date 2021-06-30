<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );

		$orderflag = get_post_meta($order->get_id(),'orderdetailsflag',true);

		if ($orderflag==1):
			wp_redirect(home_url());
		endif;
        update_post_meta( $order->get_id(), 'orderdetailsflag', 1 );
		if ($orderflag<=0):

		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li id="course_total" class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

			<?php
				$items			= array();
				$dataLayerItems	= array();
				$usersFavorites	= wpfp_get_users_favorites();
				$currentUser	= wp_get_current_user();
				$couponApplied	= false;
				$couponCode		= "";

				if(!is_array($usersFavorites)) $usersFavorites = array();

				foreach ($order->get_used_coupons() as $key1 => $value1)
				{
					$couponApplied	= true;
					$couponCode		= $value1;
				}

				if(isset($currentUser->ID) && $currentUser->ID > 0)
				{
					$userIdentifier = $currentUser->ID;
				}
				else if(isset($_COOKIE['PHPSESSID']))
				{
					$userIdentifier = $_COOKIE['PHPSESSID'];
				}

				$orderTotal  = 0;
				$discountAmt = 0;

				foreach($order->get_items() as $item_id => $item)
				{
					$vcourses = vibe_sanitize(get_post_meta($item['product_id'],'vibe_courses', false));
					$courseID = $vcourses[0];

					$courseCatInfo	= get_the_terms($courseID, 'course-cat');
					$courseslug		= get_site_url().'/?p='.$courseID;
					$coursePartner	= "";

					$cb_course_id = get_post_meta($courseID,'celeb_school_course_id',true);
					if ($cb_course_id) {
						$coursePartner = "Celebrity School";
					}

					$aiws_course_id = get_post_meta($courseID,'aiws_program_id',true);
					if ($aiws_course_id) {
						$coursePartner = "AIWS";
					}

					add_user_meta($currentUser->ID, 'purchased_on'.$courseID, time());
					add_user_meta($currentUser->ID, 'purchased_type'.$courseID, 'online');

					$orderTotal 	+= ($item['total'] + $item['total_tax']);
					$discountAmt 	+= ($item['subtotal'] - $item['total']);

					$items[] = array(
						"item_name"			=> str_replace("'", "", $item['name']),
						"amount_paid"		=> ($item['total'] + $item['total_tax']),
						"course_partners"	=> $coursePartner,
						"original_price"	=> $item['subtotal'],
						"currency"          => "INR",
						"price"				=> $item['total'],
						"course_urls"		=> $courseslug,
						"item_category"		=> (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->name : ""),
						"category_id"		=> (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->term_id : ""),
						"item_id"			=> $courseID,
						"coupon_applied"	=> $couponApplied,
						"course_age_groups"	=> get_post_meta($courseID, "vibe_course_age_group", true),
						"course_durations"	=> get_post_meta($courseID, "vibe_validity", true),
						"session_durations"	=> get_post_meta($courseID, "vibe_course_session_length", true),
						"purchased_on"		=> date('c', strtotime($order->get_date_created())),
						"repeat_purchase"	=> false,
						"wishlisted_course"	=> in_array($courseID, $usersFavorites) ? TRUE : FALSE,
					);
			    }

			    $totalItemsCount = count($items);

				$ecommerce = array(
					"currency"          => "INR",
					"transaction_id"	=> $order->get_transaction_id(),
					"payment_mode"		=> $order->get_payment_method_title(),
					"coupon_applied"	=> $couponApplied,
					"coupon_code"		=> $couponCode,
					"items"				=> $items,
				);

				$saveObj = array(
					"event"				=> 'purchase',
					"user_identifier"	=> $userIdentifier,
					"session_source"	=> "",
					"timestamp"			=> date('c', time()),
					"utm_tags"			=> "",
					"ecommerce"			=> $ecommerce,
				);

				// do_action('woocommerce_log_ga_tag', "purchase", $saveObj);
			?>

			<script type="text/javascript">
				jQuery(document).ready(function(){

					var allItems = JSON.parse('<?php echo json_encode($ecommerce); ?>');

					var allCartItemName			= [];
					var wishlistedCourseName	= [];
					var moengageItemList		= [];
					var allItemsList			= allItems.items;

					for (var i = 0; i < allItemsList.length; i++) {

						allCartItemName.push(allItemsList[i]["item_name"]);

						if(allItemsList[i]["wishlisted_course"]) {
							wishlistedCourseName.push(allItemsList[i]["item_name"]);
						}

						moengageItemList.push({
							"Course name"		: allItemsList[i]["item_name"],
							"Course URL"		: allItemsList[i]["course_urls"],
							"Course category"	: allItemsList[i]["item_category"],
							"Course partner"	: allItemsList[i]["course_partners"],
							"Course ID"			: allItemsList[i]["item_id"],
							"Age group"			: allItemsList[i]["course_age_groups"],
							"Course duration"	: allItemsList[i]["course_durations"],
							"Session duration"	: allItemsList[i]["session_durations"],
							"wishlisted_course"	: allItemsList[i]["wishlisted_course"],
							"Course Price"		: parseFloat(allItemsList[i]["original_price"]).toFixed(2),
						});
					}

					let purchaseObj = {
						"event"				: 'purchase',
						"user_identifier"	: jQuery("#footer_user_identifier").val(),
						"session_source"	: jQuery("#footer_session_source").val(),
						"timestamp"			: jQuery("#footer_timestamp").val(),
						"utm_tags"			: jQuery("#footer_utm_tags").val(),
						"ecommerce"			: allItems,
					};

					let purchaseCompletedDetailMoegObj = {
						"User identifier"		: jQuery("#footer_user_identifier").val(),
						"Session source"		: jQuery("#footer_session_source").val(),
						"Timestamp"				: jQuery("#footer_timestamp").val(),
						"UTM tags"				: jQuery("#footer_utm_tags").val(),
						"Order ID"				: "<?php echo $order->get_order_number(); ?>",
						"Courses purchased"		: allCartItemName.join(','),
						"Amount paid"			: "<?php echo $orderTotal; ?>",
						"Payment mode"			: allItems.payment_mode,
						"Coupon code"			: "<?php echo $couponCode; ?>",
						"Purchased on"			: "<?php echo date('c', time()); ?>",
						"Repeat purchase"		: false,
						"Wishlisted course name": wishlistedCourseName.join(','),
						"courses"				: {
							"items"	: moengageItemList,
						}
					};

					let purchaseCompletedSummaryMoegObj = {
						"Total count of items"	: "<?php echo $totalItemsCount; ?>",
						"Total amount paid"		: "<?php echo $orderTotal; ?>",
						"Total discount applied": "<?php echo $discountAmt; ?>",
						"Order ID"				: "<?php echo $order->get_order_number(); ?>",
					};

					// dataLayer.push({ ecommerce: null });
					dataLayer.push(purchaseObj);
					console.log(purchaseObj);

					purchaseCompletedDetailMoegObj.event 	= "mo_Purchase_Completed_Detail";
					purchaseCompletedSummaryMoegObj.event 	= "mo_Purchase_Completed_Summary";
					dataLayer.push(purchaseCompletedDetailMoegObj);
					dataLayer.push(purchaseCompletedSummaryMoegObj);

					// Moengage.track_event("Purchase_Completed_Detail", purchaseCompletedDetailMoegObj);
					// Moengage.track_event("Purchase_Completed_Summary", purchaseCompletedSummaryMoegObj);
				});
			</script>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif;

    endif; ?>
</div>