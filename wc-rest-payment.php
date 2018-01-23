<?php
/**
 * Plugin Name: WC REST Payment
 * Description: WC REST Payment adds in the missing REST API endpoint for **process payment** in WooCommerce. 
 * Author: SK8Tech
 * Author URI: https://sk8.tech
 * Version: 1.0.0
 * License: GPL2+
 **/
add_action( 'rest_api_init', 'wc_rest_payment_endpoints' );

function wc_rest_payment_endpoints() {

	/**
	 * Handle Payment Method request.
	 */
	register_rest_route( 'wc/v2', 'payment', array(
		'methods'  => 'POST',
		'callback' => 'wc_rest_payment_endpoint_handler',
	) );
}

function wc_rest_payment_endpoint_handler() {

	$response       = array();
	$parameters = $request->get_json_params();
	$payment_method = sanitize_text_field( $parameters['payment_method'] );
	$order_id       = sanitize_text_field( $parameters['order_id'] );
	$payment_token  = sanitize_text_field( $parameters['payment_token'] );
	$error          = new WP_Error();

	if ( empty( $payment_method ) ) {
		$error->add( 400, __( "Payment Method 'payment_method' is required.", 'wc-rest-payment' ), array( 'status' => 400 ) );

		return $error;

	}
	if ( empty( $order_id ) ) {
		$error->add( 400, __( "Order ID 'order_id' is required.", 'wc-rest-payment' ), array( 'status' => 400 ) );

		return $error;

	}
	if ( empty( $payment_token ) ) {
		$error->add( 400, __( "Payment Token 'payment_token' is required.", 'wc-rest-payment' ), array( 'status' => 400 ) );

		return $error;

	}
	
	if ( $payment_method === "stripe" ) {
		$wc_gateway_stripe                    = new WC_Gateway_Stripe();
		$_POST['stripe_token']            = $payment_token;
		$_POST['wc-stripe-payment-token'] = $payment_token;
		$payment_result                   = $wc_gateway_stripe->process_payment( $order_id );
		if ( $payment_result['result'] === "success" ) {
			$response['code']    = 200;
			$response['message'] = __( "Your Payment Successfully", "wc-rest-payment" );
		} else {
			$response['code']    = 401;
			$response['message'] = __( "Please enter valid card details", "wc-rest-payment" );
		}
	}  else {
		$response['code'] = 401;
		$response['message'] = __( "Please select an available payment method. Supported payment method can be found at https://wordpress.org/plugins/wc-rest-payment/#description", "wc-rest-payment" );
	}
	

	return $response;
}