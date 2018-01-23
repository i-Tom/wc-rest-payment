<?php
/**
 * Plugin Name: WC REST Payment
 * Description: WC REST Payment adds in the missing `payment processing REST API` endpoint for `WooCommerce`. 
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
	$payment_method = sanitize_text_field( $_POST['payment_method'] );
	$order_id       = sanitize_text_field( $_POST['order_id'] );
	$payment_token  = sanitize_text_field( $_POST['payment_token'] );
	$error          = new WP_Error();

	if ( empty( $payment_method ) ) {
		$error->add( 400, __( 'Payment Method is required.', 'woocommerce' ), array( 'status' => 400 ) );

		return custom_error_code( $error );

	}
	if ( empty( $order_id ) ) {
		$error->add( 400, __( 'Order ID is required.', 'woocommerce' ), array( 'status' => 400 ) );

		return custom_error_code( $error );

	}
	if ( empty( $payment_token ) ) {
		$error->add( 400, __( 'Payment Token is required.', 'woocommerce' ), array( 'status' => 400 ) );

		return custom_error_code( $error );

	}
	
	if ( $payment_method === "stripe" ) {
		$wc_gateway_stripe                    = new WC_Gateway_Stripe();
		$_POST['stripe_token']            = $payment_token;
		$_POST['wc-stripe-payment-token'] = $payment_token;
		$payment_result                   = $wc_gateway_stripe->process_payment( $order_id );
		if ( $payment_result['result'] === "success" ) {
			$response['code']    = 200;
			$response['message'] = __( "Your Payment Successfully", "payment-method" );
		} else {
			$response['code']    = 401;
			$response['message'] = __( "Please enter valid card details", "payment-method" );
		}
	}  else {
		$response['code'] = 401;
		$response['message'] = __( "Please select an available payment method. Supported payment method can be found at https://wordpress.org/plugins/wc-rest-payment/#description", "payment-method" );
	}
	

	return $response;
}