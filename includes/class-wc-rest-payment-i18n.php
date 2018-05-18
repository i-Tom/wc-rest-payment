<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sk8.tech
 * @since      1.1.0
 *
 * @package    Wc_Rest_Payment
 * @subpackage Wc_Rest_Payment/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.1.0
 * @package    Wc_Rest_Payment
 * @subpackage Wc_Rest_Payment/includes
 * @author     SK8Tech <support@sk8.tech>
 */
class Wc_Rest_Payment_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-rest-payment',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);

	}

}
