=== WC REST Payment ===
Contributors: jack50n9, sk8tech
Donate link: https://sk8.tech/donate
Tags: wc, woocommerce, wc payment, woocommerce payment, rest payment, payment api, payment rest api, json, stripe, stripe payment
Requires at least: 4.7.0
Tested up to: 4.9.8
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

Stripe:
{
	"payment_method": "stripe",
	"order_id": "7843",
	"payment_token":"tok_mastercard"
}

PayPal Express:
{
	"payment_method": "paypal_express",
	"payer_id": "payerIdFromPayPalExpressCheckout",
	"order_id": "7843",
	"payment_token":"EC-xxxx_tok_from_paypal_express_checkout"
}


1. A list of available `payment_method` can be found at FAQ below.
2. `order_id` should be the existing order id in your WooCommerce Orders.
3. Regarding `payment_token`
	1. Stripe: A list of available testing tokens for `payment_token ` in Test Mode can be found at [Stripe Testing](https://stripe.com/docs/testing).
	1. PayPal: An integration guide for testing can be found at [Test your integration
](https://developer.paypal.com/docs/classic/express-checkout/ec_test_your_integration/).

= Technical Support =

**SK8Tech - Customer Success Specialist** offers **Technical Support** to configure or install ***WP REST User***.

= Our Services =
 * [SK8Tech Sydney Web Design](https://sk8.tech/services/web-design/)
 * [SK8Tech Enterprise Email Hosting](https://sk8.tech/services/enterprise/email-hosting/)
 * [SK8Tech Emergency IT Support](https://sk8.tech/services/enterprise/it-support/emergency-support/)
 * [SK8Tech WeChat Advertising](https://sk8.tech/services/wechat/)
 
== Installation ==
  
1. Upload `wc-rest-payment` folder to the `/wp-content/plugins/` directory
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

* [PayPal Express Checkout](https://woocommerce.com/products/woocommerce-gateway-paypal-express-checkout/) Payment Gateway.
* [Stripe](https://woocommerce.com/products/stripe/) Payment Gateway.
 
= There's a bug, what do I do? =

Issues and [pull requests](https://github.com/sk8-pty-ltd/wc-rest-payment/pulls) are welcome at [Github repo](https://github.com/sk8-pty-ltd/wc-rest-payment).
 
== Screenshots ==
 
1. An sample REST API POST request to process payment using [WC REST Payment](https://wordpress.org/plugins/wc-rest-payment/).
 
== Changelog ==
 
= 1.1.0 =
* Added REST API endpoint for [PayPal Express Checkout](https://woocommerce.com/products/woocommerce-gateway-paypal-express-checkout/) Payment Gateway.
* Restructured plugin directory for future development.
 
= 1.0.0 =
* Initial Release.
* REST API endpoint for [Stripe](https://woocommerce.com/products/stripe/) Payment Gateway.

== Upgrade Notice ==

Nothing to worry! Install away!
 
== Contact Us ==

Based in Sydney, [SK8Tech](https://sk8.tech) is a innovative company providing IT services to SMEs, including [Web Design](https://sk8.tech/services/web-design), App Development and more.