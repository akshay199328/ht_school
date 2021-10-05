<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<h3><?php esc_html_e( 'Billing Details', 'woocommerce' ); ?></h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );

		foreach ( $fields as $key => $field ) {
			woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		}
		?>
	</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		window.dataLayer = window.dataLayer || [];
		window.dataLayer.push({
		  event: 'eec.checkout',
		  ecommerce: {
		    checkout: {
		      actionField: {
		        step: 2
		      }
		    }
		  }
		});
	});
	jQuery( function($){
        var fc = 'form.checkout',
            pl = 'button[type="submit"][name="woocommerce_checkout_place_order"]';

        $(fc).on( 'click', pl, function(e){
            e.preventDefault(); // Disable "Place Order" button
          	dataLayer.push({ ecommerce: null }); 
          	window.dataLayer = window.dataLayer || [];
					window.dataLayer.push({
				  event: 'eec.checkout_option',
				  ecommerce: {
				    checkout_option: {
				    actionField: {
				        step: 2,
				        option: 'Place Order Clicked'
				      },
				    }
				  }
				});
            $(fc).off(); // Enable back "Place Order button
            $(pl).trigger('click'); // Trigger submit
               
           
        });
    });
</script>
<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>
		<script type="text/javascript">
			jQuery('#place_order').click(function(e){
				dataLayer.push({ ecommerce: null }); 
					window.dataLayer.push({
				  event: 'eec.checkout_option',
				  ecommerce: {
				    checkout_option: {
				    actionField: {
				        step: 3,
				        option: 'Place Order Clicked'
				      },
				    }
				  }
				});
			});
		</script>
		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
