=== WC REST Payment ===
Contributors: jack50n9, sk8tech
Donate link: https://sk8.tech/donate
Tags: wc, woocommerce, wc payment, woocommerce payment, rest payment, payment api, payment rest api, json, stripe, stripe payment
Requires at least: 4.7.0
Tested up to: 4.9.1
Requires PHP: 5.2.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 
WC REST Payment adds in the missing REST API endpoint for **process payment** in `WooCommerce`. 
 
== Description ==

If you are a front end developer, looking to develop an app/web with WordPress+WooCommerce as your backend using REST API. You will find that [WooCommerce docs does](http://woocommerce.github.io/woocommerce-rest-api-docs/) not provide the **process payment** endpoint. 

WC REST Payment adds in the missing REST API endpoint for **process payment** in `WooCommerce`. 
 
**IMPORTANT NOTICE:**

After payment is processed successfully, the `status` of `order` will be automatically changed to **Completed**. 
If you with to the status to be set to status other than **Complete** after successful payment process, please submit a pull request.

= Usage =

Send request with JSON body. See Screenshot.

{
	"payment_method": "stripe",
	"order_id": "7843",
	"payment_token":"tok_mastercard"
}

1. A list of available `payment_method` can be found at FAQ below.
2. ¡®order_id¡¯ should be the existing order id in your WooCommerce dashbaord.
3. A list of available `payment_token ` for Test Mode can be found at [Stripe Testing](https://stripe.com/docs/testing).
 
== Installation ==
  
1. Upload `wc-rest-payment.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
 
== Frequently Asked Questions ==

= What version of WordPress is required? =

For security reasons, We always recommend you use the latest version of WordPress.
For native REST API support, we recommend you use WordPress 4.7+.
For WordPress version lower than 4.7, you will need to install [WordPress REST API (Version 2)](https://wordpress.org/plugins/rest-api/).

= What version of WooCommerce is required? =

WooCommerce v1.0+

= What payment gateways are supported? =

The supported payment gateways are listed below:

* [Stripe](https://stripe.com)
 
= There's a bug, what do I do? =

Issues and [pull requests](https://github.com/sk8-pty-ltd/wc-rest-payment/pulls) are welcome at [Github repo](https://github.com/sk8-pty-ltd/wc-rest-payment).
 
== Screenshots ==
 
1. An sample REST API POST request to process payment using [WC REST Payment](https://wordpress.org/plugins/wc-rest-payment/).
 
== Changelog ==
 
= 1.0.0 =
* Initial Release.
* REST API endpoint for Stripe Payment Gateway

== Upgrade Notice ==

Nothing to worry! Install away!
 
== Contact Us ==

Based in Sydney, [SK8Tech](https://sk8.tech) is a innovative company providing IT services to SMEs, including [Web Design](https://sk8.tech/services/web-design), App Development and more.