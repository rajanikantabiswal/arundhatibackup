<?php
/**
 * Initializer functions for addon files.
 *
 * @package miniorange-otp-verification/addons
 */

/**
 * AddOn Name: Country restriction addon
 * Plugin URI: http://miniorange.com
 * Description: Allow OTP Verification to be enabled for selected list of countries only.
 * Version: 1.0.0
 * Author: miniOrange
 * Author URI: http://miniorange.com
 * Text Domain: miniorange-otp-verification
 * WC requires at least: 2.0.0
 * WC tested up to: 3.3.4
 * License: miniOrange
 * License URI: https://miniorange.com/usecases/miniOrange_User_Agreement.pdf
 */
namespace OTP\Addons\CountryCode;

use OTP\Helper\AddOnList;
use OTP\Objects\AddOnInterface;
use OTP\Objects\BaseAddOn;
use OTP\Traits\Instance;
use OTP\Addons\CountryCode\Handler\SelectedCountry;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require 'autoload.php';
/**
 * This class is used to initialize all the Handlers, Helpers, Controllers,
 * Styles and Scripts of the addon.
 */
if ( ! class_exists( 'SelectedCountryCode' ) ) {
	/**
	 * SelectedCountryCode class
	 */
	final class SelectedCountryCode extends BaseAddOn implements AddOnInterface {

		use Instance;

		/** Declare Default variables */
		public function __construct() {
			add_action( 'mo_otp_verification_delete_addon_options', array( $this, 'mo_sc_delete_addon' ), 1 );

			parent::__construct();
		}
		/**
		 * Initialize all handlers associated with the addon
		 */
		public function initialize_handlers() {
			/** Initialize instance for addon list handler
				 *
				 *  @var AddOnList $list
				 */
			$list    = AddOnList::instance();
			$handler = SelectedCountry::instance();
			$list->add( $handler->getAddOnKey(), $handler );
		}

		/**
		 * Initialize all helper associated with the addon
		 */
		public function initialize_helpers() {
			SelectedCountry::instance();
		}

		/**
		 * This function hooks into the mo_otp_verification_add_on_controller
		 */
		public function show_addon_settings_page() {
			include SC_DIR . 'controllers/main-controller.php';
		}
		/**
		 * Function is called during deletion of the plugin to delete any options
		 * related to the add-on. This function hooks into the 'mo_otp_verification_delete_addon_options'
		 * hook of the OTP verification plugin.
		 */
		public function mo_sc_delete_addon() {
			delete_site_option( 'mo_sc_code_countrycode_enable' );
			delete_site_option( 'mo_sc_code_selected_country_list' );
		}
	}
}
