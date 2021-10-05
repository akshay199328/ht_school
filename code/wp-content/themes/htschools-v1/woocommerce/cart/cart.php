<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if(function_exists('WC') && version_compare( WC()->version, "3.8.0", ">="  )){
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

	wc_print_notices();

	do_action( 'woocommerce_before_cart' ); ?>
	<div class="cart-content">
			<div class="cart_left">
				<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

				<h2 class="cart_heading">Your Cart</h2>
				<div class="table-copy">
					<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
					<thead>
						<tr>
							<th class="product-remove"></th>
							<!-- <th class="product-thumbnail">&nbsp;</th> -->
							<th colspan="2" class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
							<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php $count = 0; $totalAmount = 0; $totalOriginalAmount = 0;
						$currentUser	= wp_get_current_user();
						$usersFavorites	= wpfp_get_users_favorites();
						$dataLayerItems	= array();
						$userIdentifier	= "";

						if(!is_array($usersFavorites)) $usersFavorites = array();

						if(isset($currentUser->ID) && $currentUser->ID > 0)
						{
							$userIdentifier = $currentUser->ID;
						}
						else if(isset($_COOKIE['PHPSESSID']))
						{
							$userIdentifier = $_COOKIE['PHPSESSID'];
						} ?>

						<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							$courseinfo= get_post_meta( $product_id, $key = 'vibe_courses', $single = false ) ;

							$course_id=$courseinfo[0][0];

							$vibe_course_event = get_post_meta($course_id,'vibe_course_event',true);
							if($vibe_course_event == 1){
								$classnane = 'codeathoncart';
							}else{
								$classnane = '';
							}

							$courseslug=get_site_url().'/?p='.$course_id;

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

								$courseCatInfo = get_the_terms($course_id, 'course-cat');
								$coursePartner = "";

								$cb_course_id = get_post_meta($course_id,'celeb_school_course_id',true);
								if ($cb_course_id) {
									$coursePartner = "Celebrity School";
								}

								$aiws_course_id = get_post_meta($course_id,'aiws_program_id',true);
								if ($aiws_course_id) {
									$coursePartner = "AIWS";
								}

								$totalAmount			+= $cart_item['line_total'];
								$totalOriginalAmount	+= $cart_item['line_subtotal'];

								$dataLayerItems[] = array(
									"user_identifier"		=> $userIdentifier,
									"session_source"		=> "",
									"timestamp"				=> date('c', time()),
									"utm_tags"				=> "",
									"course_name"			=> str_replace("'", "", $_product->get_name()),
									"course_url"			=> $courseslug,
									"course_category"		=> (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->name : ""),
									"course_partner"		=> $coursePartner,
									"category_id"			=> (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->term_id : 0),
									"course_id"				=> $course_id,
									"course_price"			=> $cart_item['line_subtotal'],
									"course_discount_price"	=> $cart_item['line_total'],
									"course_tax"			=> $cart_item['line_tax'],
									"age_group"				=> get_post_meta($course_id, "vibe_course_age_group", true),
									"course_duration"		=> get_post_meta($course_id, "vibe_validity", true),
									"session_duration"		=> get_post_meta($course_id, "vibe_course_session_length", true),
									"wishlisted_course"		=> in_array($course_id, $usersFavorites) ? TRUE : FALSE,
								); ?>

								<input type="hidden" id="course_name_<?php echo $course_id;?>" value="<?php echo $_product->get_name();?>">
								<input type="hidden" id="course_url_<?php echo $course_id;?>" value="<?php echo $courseslug;?>">
								<input type="hidden" id="course_category_<?php echo $course_id;?>" value="<?php echo (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->name : "");?>">
								<input type="hidden" id="course_partner_<?php echo $course_id;?>" value="<?php echo $coursePartner;?>">
								<input type="hidden" id="category_id_<?php echo $course_id;?>" value="<?php echo (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->term_id : 0);?>">
								<input type="hidden" id="course_id_<?php echo $course_id;?>" value="<?php echo $course_id;?>">
								<input type="hidden" id="course_price_<?php echo $course_id;?>" value="<?php echo $cart_item['line_subtotal']; ?>">
								<input type="hidden" id="course_tax_<?php echo $course_id;?>" value="<?php echo $cart_item['line_tax']; ?>">
								<input type="hidden" id="age_group_<?php echo $course_id;?>" value="<?php echo get_post_meta($course_id, "vibe_course_age_group", true);?>">
								<input type="hidden" id="course_duration_<?php echo $course_id;?>" value="<?php echo get_post_meta($course_id, "vibe_validity", true);?>">
								<input type="hidden" id="session_duration_<?php echo $course_id;?>" value="<?php echo get_post_meta($course_id, "vibe_course_session_length", true);?>">
								<input type="hidden" id="wishlisted_course_<?php echo $course_id;?>" value="<?php echo in_array($course_id, $usersFavorites) ? '1' : '0';?>">

								<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> <?php echo $classnane; ?>">

									<td class="product-remove">
										<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s" data-count="%s">&times;</a>',
												esc_url(wc_get_cart_remove_url( $cart_item_key ) ),
												esc_html__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() ),
												$count++
											), $cart_item_key );
										?>
									</td>

									<td class="product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo  $thumbnail ;// PHPCS: XSS ok.
										} else {
											printf( '<a class="select_course_item" data-id="'.$course_id.'" href="%s">%s</a>', esc_url( $courseslug ),  $thumbnail  );
											// PHPCS: XSS ok.
										}
										?>
									</td>

									<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a class="select_course_item" data-id="'.$course_id.'" href="%s">%s</a>', esc_url( $courseslug ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>' ) );
										}
										?>
									</td>

									<!-- <td class="product-price" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
										?>
									</td> -->

									<!-- <td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
										<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input( array(
													'input_name'    => "cart[{$cart_item_key}][qty]",
													'input_value'   => $cart_item['quantity'],
													'max_value'     => $_product->get_max_purchase_quantity(),
													'min_value'     => '0',
													'product_name'  => $_product->get_name(),
												), $_product, false );
											}

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
										?>
									</td> -->

									<td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
										?>
									</td>
								</tr>
								<?php
							}
						}
						?>

						<?php do_action( 'woocommerce_cart_contents' ); ?>

						<tr class="apply_coupon">
							<td colspan="6" class="actions coupon_td">

								<?php if ( wc_coupons_enabled() ) { ?>
									<div class="coupon">
										<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button apply-coupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
										<?php do_action( 'woocommerce_cart_coupon' ); ?>
									</div>
								<?php } ?>


								<?php do_action( 'woocommerce_cart_actions' ); ?>

								<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							</td>
						</tr>



						<?php do_action( 'woocommerce_after_cart_contents' ); ?>
					</tbody>
				</table>
			</div>

				<?php do_action( 'woocommerce_after_cart_table' ); ?>

			</form>
			<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
			<?php
			/**
			 * Cart collaterals hook.
			 *
			 * @hooked woocommerce_cross_sell_display
			 * @hooked woocommerce_cart_totals - 10
			 */
			do_action( 'woocommerce_cart_collaterals' );
			?>
		</div>
		<div class="cart_right">
			<?php
				if(!did_action('woocommerce_cart_totals')){
					do_action('woocommerce_cart_totals');
				}
			?>
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function(){

			var allItems = JSON.parse('<?php echo json_encode($dataLayerItems); ?>');

			var totalDiscountAmount	= '<?php echo $totalAmount; ?>';
			var totalOrigAmount		= '<?php echo $totalOriginalAmount; ?>';
			var totalItems			= allItems.length;

			if(totalItems > 0) {

				var couponApplied	= false;
				var coupon			= "";

				if(jQuery('.cart-discount').length > 0) {
					couponApplied = true;
					coupon = jQuery('.cart-discount :first-child').eq(0).text().replace("Coupon:", "").trim();
				}

				var allCartItemName		= [];
				var moengageItemList	= [];
				var beginCheckoutItems	= [];
				var cartViewedItems		= [];
				var productItems		= [];

				for (var i = 0; i < totalItems; i++) {

					allCartItemName.push(allItems[i]["course_name"]);

					moengageItemList.push({
						"Course name"		: allItems[i]["course_name"],
						"Course URL"		: allItems[i]["course_url"],
						"Course category"	: allItems[i]["course_category"],
						"Course partner"	: allItems[i]["course_partner"],
						"Course ID"			: parseInt(allItems[i]["course_id"]),
						"Age group"			: allItems[i]["age_group"],
						"Course duration"	: allItems[i]["course_duration"],
						"Session duration"	: allItems[i]["session_duration"],
						"Course Price"		: parseInt(allItems[i]["course_discount_price"]),
					});

					cartViewedItems.push({
						"item_name"			: allItems[i]["course_name"],
						"course_url"		: allItems[i]["course_url"],
						"item_category"		: allItems[i]["course_category"],
						"course_partner"	: allItems[i]["course_partner"],
						"item_id"			: parseInt(allItems[i]["course_id"]),
						"age_group"			: allItems[i]["age_group"],
						"course_duration"	: allItems[i]["course_duration"],
						"session_duration"	: allItems[i]["session_duration"],
						"wishlisted_course"	: allItems[i]["wishlisted_course"],
						"price"				: parseInt(allItems[i]["course_discount_price"]),
						"original_price"	: parseInt(allItems[i]["course_price"]),
					});

					beginCheckoutItems.push({
						"item_name"			: allItems[i]["course_name"],
						"course_url"		: allItems[i]["course_url"],
						"item_category"		: allItems[i]["course_category"],
						"course_partner"	: allItems[i]["course_partner"],
						"item_id"			: parseInt(allItems[i]["course_id"]),
						"age_group"			: allItems[i]["age_group"],
						"course_duration"	: allItems[i]["course_duration"],
						"session_duration"	: allItems[i]["session_duration"],
						"wishlisted_course"	: allItems[i]["wishlisted_course"],
						"price"				: parseInt(allItems[i]["course_discount_price"]),
						"original_price"	: parseInt(allItems[i]["course_price"]),
					});

					productItems.push({
						"item_name"			: allItems[i]["course_name"],
						"course_url"		: allItems[i]["course_url"],
						"item_category"		: allItems[i]["course_category"],
						"course_partner"	: allItems[i]["course_partner"],
						"item_id"			: parseInt(allItems[i]["course_id"]),
						"age_group"			: allItems[i]["age_group"],
						"course_duration"	: allItems[i]["course_duration"],
						"session_duration"	: allItems[i]["session_duration"],
						"wishlisted_course"	: allItems[i]["wishlisted_course"],
						"price"				: parseInt(allItems[i]["course_discount_price"]),
						"original_price"	: parseInt(allItems[i]["course_price"]),
					});
				}

				let cartViewedObj = {
					"event"				: 'view_cart',
					"user_identifier"	: parseInt(jQuery("#footer_user_identifier").val()),
					"session_source"	: jQuery("#footer_session_source").val(),
					"timestamp"			: jQuery("#footer_timestamp").val(),
					"utm_tags"			: jQuery("#footer_utm_tags").val(),
					"item_count"		: totalItems,
					"currency"			: "INR",
					"coupon_applied"	: couponApplied,
					"coupon"			: coupon,
					"original_value"	: parseInt(totalOrigAmount),
					"value"				: parseInt(totalDiscountAmount),
					"ecommerce"			: {
						"items"	: cartViewedItems,
					}
				};

				let cartViewedMoegObj = {
					"Item count"		: totalItems,
					"Total cart amount"	: parseInt(totalDiscountAmount),
					
				};

					for (var i = 0; i < totalItems; i++) {
						cartViewedMoegObj["course_name_"+(i+1)] = allItems[i]["course_name"];
						cartViewedMoegObj["course_id_"+(i+1)] = parseInt(allItems[i]["course_id"]);
					}

				dataLayer.push(cartViewedObj);
				console.log(cartViewedObj);

				cartViewedMoegObj.event = "mo_Cart_Viewed";
				dataLayer.push({ ecommerce: null }); 
				dataLayer.push(cartViewedMoegObj);
				// Moengage.track_event("Cart_Viewed", cartViewedMoegObj);

				window.dataLayer = window.dataLayer || [];
				window.dataLayer.push({
				  event: 'eec.checkout',
				  ecommerce: {
				    checkout: {
				      actionField: {
				        step: 1
				      },
				      products: productItems
				    }
				  }
				});

				let beginCheckoutObj = {
					"event"					: 'begin_checkout',
					"user_identifier"		: parseInt(jQuery("#footer_user_identifier").val()),
					"session_source"		: jQuery("#footer_session_source").val(),
					"timestamp"				: jQuery("#footer_timestamp").val(),
					"utm_tags"				: jQuery("#footer_utm_tags").val(),
					"item_count"			: totalItems,
					"coupon_applied"		: couponApplied,
					"coupon"				: coupon,
					"original_cart_value"	: parseInt(totalOrigAmount),
					"total_cart_amount"		: parseInt(totalDiscountAmount),
					"ecommerce"				: {
						"items"	: beginCheckoutItems,
					}
				};

				let beginCheckoutMoegObj = {
					"User identifier"						: parseInt(jQuery("#footer_user_identifier").val()),
					"Session source"						: jQuery("#footer_session_source").val(),
					"Timestamp"								: jQuery("#footer_timestamp").val(),
					"UTM tags"								: jQuery("#footer_utm_tags").val(),
					"Coupon applied"						: couponApplied,
					"Coupon code"							: coupon,
					//"Original cart value"					: parseInt(totalOrigAmount),
					"Discounted cart value (after coupon)"	: parseInt(totalDiscountAmount),
				};

				jQuery('.checkout-button').click(function(e){
					dataLayer.push({ ecommerce: null }); 
						window.dataLayer.push({
					  event: 'eec.checkout_option',
					  ecommerce: {
					    checkout_option: {
					    actionField: {
					        step: 1,
					        option: 'Proceed to checkout Clicked'
					      },
					         products: productItems
					    }
					  }
					});

					var eventcart = jQuery('#eventcart').text();

					if(eventcart != 1){


						e.preventDefault();
						var link = jQuery(this).attr("href");

						// dataLayer.push({ ecommerce: null });
						dataLayer.push(beginCheckoutObj);
						console.log(beginCheckoutObj);

						beginCheckoutMoegObj.event = "mo_Checkout_Initiated";
						dataLayer.push({ ecommerce: null }); 
						dataLayer.push(beginCheckoutMoegObj);
						// Moengage.track_event("Checkout_Initiated", beginCheckoutMoegObj);

						setTimeout(function(){
							window.location.href = link;
						}, 500);
					}else{
						alert('Add only one codeathon course in cart');
						return false;
					}

					
				});
			}

			$('.remove').click( function( event ) {

				if( ! confirm( 'Are you sure you want to remove this course from Your Cart' ) ) {
					event.preventDefault();
					event.stopPropagation();
					refresh_cart_fragment();
				}

				var removeFromCartItem = [];
				var removingItem	= allItems[$(this).attr("data-count")];
				var resultingAmont	= totalDiscountAmount - removingItem['course_discount_price'];

				removeFromCartItem.push({
					"item_name"					: removingItem['course_name'],
					"course_url"				: removingItem['course_url'],
					"item_category"				: removingItem['course_category'],
					"course_partner"			: removingItem['course_partner'],
					"price"						: parseFloat(removingItem['course_discount_price']).toFixed(2),
					"course_age_group"			: removingItem['age_group'],
					"course_duration"			: removingItem['course_duration'],
					"course_session_duration"	: removingItem['session_duration'],
					"category_id"				: parseInt(removingItem['category_id']),
					"item_id"					: parseInt(removingItem['course_id']),
					"wishlisted_course"			: removingItem['wishlisted_course'],
				});

				let removeFromCartObj = {
					"event"					: 'remove_from_cart',
					"user_identifier"		: parseInt(jQuery("#footer_user_identifier").val()),
					"session_source"		: jQuery("#footer_session_source").val(),
					"timestamp"				: jQuery("#footer_timestamp").val(),
					"utm_tags"				: jQuery("#footer_utm_tags").val(),
					"all_cart_items"		: totalItems,
					"starting_cart_value"	: parseFloat(totalDiscountAmount).toFixed(2),
					"resulting_cart_value"	: parseFloat(resultingAmont).toFixed(2),
					"ecommerce"				: {
						"items"	: removeFromCartItem,
					}
				};

				let removeFromCartMoegObj = {
					"User identifier"					: parseInt(jQuery("#footer_user_identifier").val()),
					"Session source"					: jQuery("#footer_session_source").val(),
					"Timestamp"							: jQuery("#footer_timestamp").val(),
					"UTM tags"							: jQuery("#footer_utm_tags").val(),
					"All cart items"					: allCartItemName.join(','),
					"Removed course name"				: removingItem['course_name'],
					"Removed course URL"				: removingItem['course_url'],
					"Removed course category"			: removingItem['course_category'],
					"Removed course partner"			: removingItem['course_partner'],
					"Removed course price"				: parseInt(removingItem['course_discount_price']).toFixed(2),
					"Starting cart value"				: parseInt(totalDiscountAmount).toFixed(2),
					"Resulting cart value"				: parseInt(resultingAmont).toFixed(2),
					"Removed course age group"			: removingItem['age_group'],
					"Removed course duration"			: removingItem['course_duration'],
					"Removed course session duration"	: removingItem['session_duration'],
					"Removed Category ID"				: parseInt(removingItem['category_id']),
					"Removed Course ID"					: parseInt(removingItem['course_id']),
					"Removed Wishlisted course"			: removingItem['wishlisted_course'],
				};

				// dataLayer.push({ ecommerce: null });
				dataLayer.push(removeFromCartObj);
				console.log(removeFromCartObj);

				removeFromCartMoegObj.event = "mo_Removed_From_Cart";
				dataLayer.push({ ecommerce: null }); 
				dataLayer.push(removeFromCartMoegObj);
				dataLayer.push({ ecommerce: null }); 
				window.dataLayer = window.dataLayer || [];
				window.dataLayer.push({
				  event: 'eec.remove',
				  ecommerce: {
				    remove: {
				      actionField: '',
				      products: removeFromCartMoegObj
				    }
				  }
				});
				// Moengage.track_event("Removed_From_Cart", removeFromCartMoegObj);
			});
		});
	</script>

	<?php do_action( 'woocommerce_after_cart' ); ?>

<?php

}else{
	/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

	wc_print_notices();

	do_action( 'woocommerce_before_cart' ); ?>
	<div class="row">
			<div class="col-md-8">
				<h2 class="cart_heading">Your Cart</h2>
				<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

		<?php do_action( 'woocommerce_before_cart_table' ); ?>


				<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
					<thead>
						<tr>
							<th class="product-remove">&nbsp;</th>
							<th class="product-thumbnail">&nbsp;</th>
							<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
							<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
							<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
							<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php do_action( 'woocommerce_before_cart_contents' ); ?>

						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
								<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

									<td class="product-remove">
										<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
												'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
												esc_url(wc_get_cart_remove_url( $cart_item_key ) ),
												esc_html__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											), $cart_item_key );
										?>
									</td>

									<td class="product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo  $thumbnail ;// PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ),  $thumbnail  );
											// PHPCS: XSS ok.
										}
										?>
									</td>

									<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>' ) );
										}
										?>
									</td>

									<td class="product-price" data-title="<?php _e( 'Price', 'woocommerce' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
										?>
									</td>

									<td class="product-quantity" data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>">
										<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input( array(
													'input_name'    => "cart[{$cart_item_key}][qty]",
													'input_value'   => $cart_item['quantity'],
													'max_value'     => $_product->get_max_purchase_quantity(),
													'min_value'     => '0',
													'product_name'  => $_product->get_name(),
												), $_product, false );
											}

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
										?>
									</td>

									<td class="product-subtotal" data-title="<?php _e( 'Total', 'woocommerce' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
										?>
									</td>
								</tr>
								<?php
							}
						}
						?>

						<?php do_action( 'woocommerce_cart_contents' ); ?>

						<tr>
							<td colspan="6" class="actions">

								<?php if ( wc_coupons_enabled() ) { ?>
									<div class="coupon">
										<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
										<?php do_action( 'woocommerce_cart_coupon' ); ?>
									</div>
								<?php } ?>

								<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

								<?php do_action( 'woocommerce_cart_actions' ); ?>

								<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							</td>
						</tr>

						<?php do_action( 'woocommerce_after_cart_contents' ); ?>
					</tbody>
				</table>

				<?php do_action( 'woocommerce_after_cart_table' ); ?>

			</form>
			<?php do_action( 'woocommerce_cart_collaterals' ); ?>
		</div>
		<div class="col-md-4">
			<div class="cart-collaterals">
				asdasd
				<?php do_action( 'woocommerce_cart_totals' ); ?>

			</div>
		</div>
	</div>

	<?php do_action( 'woocommerce_after_cart' ); ?>
    <?php
}