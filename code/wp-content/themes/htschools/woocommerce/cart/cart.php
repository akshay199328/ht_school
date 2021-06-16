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
	<div class="row">
			<div class="col-md-8">
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

						<?php $count = 0; $totalAmount = 0;
						$currentUser	= wp_get_current_user();
						$usersFavorites	= wpfp_get_users_favorites();
						$dataLayerItems	= array();
						$userIdentifier	= "";

						if(isset($currentUser->ID) && $currentUser->ID > 0)
						{
							$userIdentifier = $currentUser->ID;
						}
						else if(isset($_COOKIE['PHPSESSID']))
						{
							$userIdentifier = $_COOKIE['PHPSESSID'];
						}

						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							$courseinfo= get_post_meta( $product_id, $key = 'vibe_courses', $single = false ) ;

							$course_id=$courseinfo[0][0];

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

								$totalAmount += $cart_item['line_total'];

								$dataLayerItems[] = array(
									"User identifier"	=> $userIdentifier,
									"Session source"	=> "",
									"Timestamp"			=> date('c', time()),
									"UTM tags"			=> "",
									"Course name"		=> $_product->get_name(),
									"Course URL"		=> $courseslug,
									"Course category"	=> (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->name : ""),
									"Course partner"	=> $coursePartner,
									"Category ID"		=> (($courseCatInfo != null && count($courseCatInfo) > 0) ? $courseCatInfo[0]->term_id : 0),
									"Course ID"			=> $course_id,
									"Course price"		=> $cart_item['line_total'],
									"Course tax"		=> $cart_item['line_tax'],
									"Age group"			=> get_post_meta($course_id, "vibe_course_age_group", true),
									"Course duration"	=> get_post_meta($course_id, "vibe_validity", true),
									"Session duration"	=> get_post_meta($course_id, "vibe_course_session_length", true),
									"Wishlisted course"	=> in_array($course_id, $usersFavorites) ? true : false,
								); ?>

								<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

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
											printf( '<a href="%s">%s</a>', esc_url( $courseslug ),  $thumbnail  );
											// PHPCS: XSS ok.
										}
										?>
									</td>

									<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $courseslug ), $_product->get_name() ), $cart_item, $cart_item_key ) );
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
						<?php /*
						<tr>
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

						*/?>

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
		<div class="col-md-4">
			<div class="cart-collaterals">
				<?php


				if(!did_action('woocommerce_cart_totals')){
					do_action('woocommerce_cart_totals');
				}

				?>

			</div>
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function(){

			var allItems = JSON.parse('<?php echo json_encode($dataLayerItems); ?>');

			var totalItems = allItems.length;
			var beginCheckoutItems = [];

			for (var i = 0; i < allItems.length; i++) {
				beginCheckoutItems.push({
					"User identifier"	: allItems[i]["User identifier"],
					"Session source"	: allItems[i]["Session source"],
					"Timestamp"			: allItems[i]["Timestamp"],
					"UTM tags"			: allItems[i]["UTM tags"],
					"Course name"		: allItems[i]["Course name"],
					"Course URL"		: allItems[i]["Course URL"],
					"Course category"	: allItems[i]["Course category"],
					"Course partner"	: allItems[i]["Course partner"],
					"Category ID"		: allItems[i]["Category ID"],
					"Course ID"			: allItems[i]["Course ID"],
					"Course price"		: allItems[i]["Course price"],
					"Age group"			: allItems[i]["Age group"],
					"Course duration"	: allItems[i]["Course duration"],
					"Session duration"	: allItems[i]["Session duration"],
					"Wishlisted course"	: allItems[i]["Wishlisted course"],
				});
			}

			let beginCheckoutObj = {
				"event"		: 'begin_checkout',
				"ecommerce"	: {
					"items"	: beginCheckoutItems,
				}
			};

			jQuery('.checkout-button').click(function(){
				dataLayer.push(beginCheckoutObj);
			});

			$('.remove').click( function( event ) {

				if( ! confirm( 'Are you sure you want to remove this course from Your Cart' ) ) {
					event.preventDefault();
					event.stopPropagation();
					refresh_cart_fragment();
				}

				var removeFromCartItem = [];
				var removingItem	= allItems[$(this).attr("data-count")];
				var totalAmount		= '<?php echo $totalAmount; ?>';
				var resultingAmont	= totalAmount - removingItem['Course price'];

				removeFromCartItem.push({
					"User identifier"					: removingItem['User identifier'],
					"Session source"					: removingItem['Session source'],
					"Timestamp"							: '<?php echo date('c', time()); ?>',
					"UTM tags"							: "",
					"All cart items"					: totalItems,
					"Removed course name"				: removingItem['Course name'],
					"Removed course URL"				: removingItem['Course URL'],
					"Removed course category"			: removingItem['Course category'],
					"Removed course partner"			: removingItem['Course partner'],
					"Removed course price"				: removingItem['Course price'],
					"Starting cart value"				: totalAmount,
					"Resulting cart value"				: resultingAmont,
					"Removed course age group"			: removingItem['Age group'],
					"Removed course duration"			: removingItem['Course duration'],
					"Removed course session duration"	: removingItem['Session duration'],
					"Removed Category ID"				: removingItem['Category ID'],
					"Removed Course ID"					: removingItem['Course ID'],
					"Removed Wishlisted course?"		: removingItem['Wishlisted course'],
				});

				let removeFromCartObj = {
					"event"		: 'remove_from_cart',
					"ecommerce"	: {
						"items"	: removeFromCartItem,
					}
				};
				dataLayer.push(removeFromCartObj);
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