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
		<h2 class="cart_heading">Cart</h2>
		<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100">
		  	<g id="Group_15670" data-name="Group 15670" transform="translate(-633 -251)">
			    <circle id="Ellipse_435" data-name="Ellipse 435" cx="50" cy="50" r="50" transform="translate(633 251)" fill="#c7e3fd"/>
			    <g id="Group_15669" data-name="Group 15669" transform="translate(7 18.494)">
			      <g id="Group_15668" data-name="Group 15668" transform="translate(645 267.325)">
			        <path id="Path_30160" data-name="Path 30160" d="M-11952.5,9580.5h8.01l12.131,36.275h28.6" transform="translate(11952.499 -9580.5)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="2"/>
			        <path id="Path_30161" data-name="Path 30161" d="M-11898.5,9610.5h48.873l-9.494,23.034h-31.717" transform="translate(11909.31 -9603.823)" fill="#fff" stroke="#000" stroke-linejoin="round" stroke-width="2"/>
			        <g id="Ellipse_440" data-name="Ellipse 440" transform="translate(18.65 41.188)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="2">
			          <circle cx="3.73" cy="3.73" r="3.73" stroke="none"/>
			          <circle cx="3.73" cy="3.73" r="2.73" fill="none"/>
			        </g>
			        <g id="Ellipse_441" data-name="Ellipse 441" transform="translate(41.032 41.188)" fill="none" stroke="#000" stroke-linejoin="round" stroke-width="2">
			          <circle cx="3.73" cy="3.73" r="3.73" stroke="none"/>
			          <circle cx="3.73" cy="3.73" r="2.73" fill="none"/>
			        </g>
			      </g>
			      <path id="Path_30180" data-name="Path 30180" d="M-12871.921,10828.02l-5.412-11.354" transform="translate(13547.418 -10560.695)" fill="none" stroke="#000" stroke-width="2"/>
			      <path id="Path_30181" data-name="Path 30181" d="M0,17.691,3.168,0" transform="translate(683.953 249.892) rotate(-7)" fill="none" stroke="#000" stroke-width="2"/>
			      <path id="Path_30182" data-name="Path 30182" d="M-12844,10828.713l6.867-8.713" transform="translate(13537.85 -10561.39)" fill="none" stroke="#000" stroke-width="2"/>
			    </g>
		  	</g>
		</svg>

		<h4><span class="dark">Oops!</span> Your Cart Is Empty..</h4>
		<span class="semi-title">There is nothing in your cart</span>
		<p class="return-to-shops">
			<a class="wc-backward empty_btn" href="<?php echo get_site_url();?>/courses">
				Add Courses
			</a>
		</p>
	</div>
	
<?php endif; ?>
