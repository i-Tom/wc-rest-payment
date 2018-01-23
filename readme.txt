=== WC REST Payment ===
Contributors: jack50n9
Donate link: https://sk8.tech/donate
Tags: wc, woocommerce, wc payment, woocommerce payment, rest payment, payment api, payment rest api, json
Requires at least: 4.7.0
Tested up to: 4.9.1
Requires PHP: 5.2.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
WC REST Payment adds in the missing REST API endpoint for **process payment** in `WooCommerce`. 
 
== Description ==

If you¡¯re a front end developer, looking to develop an app/web with WordPress+WooCommerce as your backend using REST API. You¡¯ll find that [WooCommerce docs does](http://woocommerce.github.io/woocommerce-rest-api-docs/) not provide the **process payment** endpoint. 

WC REST Payment adds in the missing REST API endpoint for **process payment** in `WooCommerce`. 
 
**IMPORTANT NOTICE:**

This plugin only provides the **process payment** function for WooCommerce, however it does not update the status of the `order` object in WooCommerce. 

This means that you (the front end app/web) is responsible for updating the `order` object, after the successful **payment process**.

= Usage =

// TODO
 
== Installation ==
  
1. Upload `wc-rest-payment.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
 
== Frequently Asked Questions ==

= What version of WordPress is required? =

For security reasons, We always recommend you use the latest version of WordPress.
For native REST API support, we recommend you use WordPress 4.7+.
For WordPress version lower than 4.7, you¡¯ll need to install [WordPress REST API (Version 2)](https://wordpress.org/plugins/rest-api/).

= What version of WooCommerce is required? =

WooCommerce v1.0+

= What payment gateways are supported? =

The supported payment gateways are listed below:

* [Stripe](https://stripe.com)
 
= There's a bug, what do I do? =

Issues and [pull requests](https://github.com/sk8-pty-ltd/wc-rest-payment/pulls) are welcome at [Github repo](https://github.com/sk8-pty-ltd/wc-rest-payment).
 
== Screenshots ==
 
// TODO 
 
== Changelog ==
 
= 1.0.0 =
* Initial Release.
* REST API endpoint for Stripe Payment Gateway

== Upgrade Notice ==

Nothing to worry! Install away!
 
== Contact Us ==

Based in Sydney, [SK8Tech](https://sk8.tech) is a innovative company providing IT services to SMEs, including [Web Design](https://sk8.tech/services/web-design), App Development and more.