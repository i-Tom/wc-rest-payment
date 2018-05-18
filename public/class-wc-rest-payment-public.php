<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sk8.tech
 * @since      1.1.0
 *
 * @package    Wc_Rest_Payment
 * @subpackage Wc_Rest_Payment/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wc_Rest_Payment
 * @subpackage Wc_Rest_Payment/public
 * @author     SK8Tech <support@sk8.tech>
 */
class Wc_Rest_Payment_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.1.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add the endpoints to the API
	 */
	public function add_api_routes() {
		/**
		 * Handle Process Payment request.
		 */
		register_rest_route('wc/v2', 'payment', array(
			'methods' => 'POST',
			'callback' => 'process_payment',
		));
	}

	/**
	 * Get the payment token and order id in the request body and Process Payment
	 *
	 * @author Jack
	 *
	 * @since    1.1.0
	 *
	 * @param [type] $request [description]
	 *
	 * @return [type] [description]
	 */
	public function process_payment($request = null) {

		$response = array();
		$parameters = $request->get_json_params();
		$payment_method = sanitize_text_field($parameters['payment_method']);
		$order_id = sanitize_text_field($parameters['order_id']);
		$payment_token = sanitize_text_field($parameters['payment_token']);
		$error = new WP_Error();

		if (empty($payment_method)) {
			$error->add(400, __("Payment Method 'payment_method' is required.", 'wc-rest-payment'), array('status' => 400));
			return $error;
		}
		if (empty($order_id)) {
			$error->add(401, __("Order ID 'order_id' is required.", 'wc-rest-payment'), array('status' => 400));
			return $error;
		} else if (wc_get_order($order_id) == false) {
			$error->add(402, __("Order ID 'order_id' is invalid. Order does not exist.", 'wc-rest-payment'), array('status' => 400));
			return $error;
		} else if (wc_get_order($order_id)->get_status() !== 'pending') {
			$error->add(403, __("Order status is NOT 'pending', meaning order had already received payment. Multiple payment to the same order is not allowed. ", 'wc-rest-payment'), array('status' => 400));
			return $error;
		}
		if (empty($payment_token)) {
			$error->add(404, __("Payment Token 'payment_token' is required.", 'wc-rest-payment'), array('status' => 400));
			return $error;
		}

		if ($payment_method === "stripe") {
			$wc_gateway_stripe = new WC_Gateway_Stripe();
			$_POST['stripe_token'] = $payment_token;
			$payment_result = $wc_gateway_stripe->process_payment($order_id);
			if ($payment_result['result'] === "success") {
				$response['code'] = 200;
				$response['message'] = __("Your Payment was Successful", "wc-rest-payment");
			} else {
				$response['code'] = 401;
				$response['message'] = __("Please enter valid card details", "wc-rest-payment");
			}
		} else {
			$response['code'] = 405;
			$response['message'] = __("Please select an available payment method. Supported payment method can be found at https://wordpress.org/plugins/wc-rest-payment/#description", "wc-rest-payment");
		}

		return new WP_REST_Response($response, 123);
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Rest_Payment_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Rest_Payment_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wc-rest-payment-public.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Rest_Payment_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Rest_Payment_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wc-rest-payment-public.js', array('jquery'), $this->version, false);

	}

}
