===  WooCommerce Sold Individually for Variations ===
Contributors: webdados
Tags: woocommerce, ecommerce, e-commerce, variations, webdados
Author URI: https://www.webdados.pt
Plugin URI: 
Requires at least: 4.7
Tested up to: 5.7
Stable tag: 0.6

This plugin allows you to apply the “Sold individually” WooCommerce product setting to the whole variable product (including its variations), thus not allowing the customer to buy more than one unit of the variable product, even if it’s a different variation. You can also set that a specific variation is “Sold individually”.

== Description ==

= Option 1: Sell the whole variable product individually =

This plugin allows you to apply the “Sold individually” WooCommerce product setting to the whole variable product (including its variations), thus not allowing the customer to buy more than one unit of the variable product, even if it’s a different variation.

Example: Your WooCommerce store has a wine that you sell in 2-pack or 6-pack boxes, and, let’s say, for logistical reasons you don’t want the customer to buy both in a single order. With this WooCommerce extension, the client can only pick one unit of one of the variations.

Inspired by [this GitHub thread](https://github.com/woocommerce/woocommerce/issues/19443).

= Option 2: Sell a variation individually =

You can also set that a specific variation is “Sold individually”. In that scenario, the variable product should NOT be set as “Sold individually”.

Example: Your WooCommerce store sells music, both as physical CDs and digital downloads. Each album is a product with variations, allowing the customer to either buy the physical CD (as many as he wants) or the audio download (sold individually).

== Installation ==

* Use the included automatic install feature on your WordPress admin panel and search for “WooCommerce Sold Individually for Variations”.
* Option 1: Go to your variable product inventory settings and activate the “Sold individually” and “Apply Sold individually to variations” options.
* Option 2: Go to your variation settings and activate the “Sold individually” option.

== Frequently Asked Questions ==

= I need help, can I get technical support? =

This is a free plugin. It’s our way of giving back to the wonderful WordPress community.

There’s a support tab on the top of this page, where you can ask the community for help. We’ll try to keep an eye on the forums but we cannot promise to answer support tickets.

If you reach us by email or any other direct contact means, we’ll assume you are in need of urgent, premium, and of course, paid-for support.

= Why is this plugin not compatible with WooCommerce versions lower than 3.0? =

Come on dude...

= Can I contribute with a translation? =

Sure. Go to [GlotPress](https://translate.wordpress.org/projects/wp-plugins/woo-sold-individually-for-variations) and help us out.

== Screenshots ==
 
1. Variable product settings
2. Error message when adding second variation to the cart
3. Variation specific “Sold individually” field

== Changelog ==

= 0.6 - 2021-03-10 =
* Change the “You cannot add another...” message to use the main product name instead of the variation name
* Tested with WordPress 5.8-alpha-50516 and WooCommerce 5.1.0

= 0.5 =
* Tested with WordPress 5.5-alpha-47783 and WooCommerce 4.2.0-beta.1

= 0.4 =
* Fix jQuery error

= 0.3 =
* Tested with WordPress 5.2.5-alpha and WooCommerce 3.8.0

= 0.2 =
* “Sold individually” option at the product variation level, so you can sell a variation individually but not all of them
* Tested with WordPress 5.1 and WooCommerce 3.5.5

= 0.1.2 =
* WooCommerce CRUD functions to save product meta

= 0.1.1 =
* readme.txt and plugin description improvements
* Check for WooCommerce 3.0 (or above)

= 0.1 =
* Initial release