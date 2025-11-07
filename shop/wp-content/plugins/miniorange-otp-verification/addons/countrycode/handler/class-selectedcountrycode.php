<?php
/**
 * Handler functions for selected country addon
 *
 * @package miniorange-otp-verification/addons
 */

namespace OTP\Addons\CountryCode\Handler;

use OTP\Addons\CountryCode\Helper\SelectedCountry;
use OTP\Helper\FormSessionVars;
use OTP\Helper\MoUtility;
use OTP\Helper\MoMessages;
use OTP\Helper\CountryList;
use OTP\Helper\SessionUtils;
use OTP\Objects\VerificationType;
use OTP\Traits\Instance;
use WP_User;
use OTP\MoInit;

/**
 * Selected country Handler handles sending an OTP to the user instead of
 * the link that usually gets sent out to the user's email address.
 */
class SelectedCountryCode {

	use Instance;

	/**Variable declaration
	 * $selected_country_type.
	 *
	 * @var array
	 */
	private $selected_country_type;

	/**Variable declaration
	 * $is_country_allowed.
	 *
	 * @var array
	 */
	private $is_country_allowed;

	/**Variable declaration
	 * $is_country_blocked.
	 *
	 * @var array
	 */
	private $is_country_blocked;

	/**Variable declaration
	 * $sc_allow_tag.
	 *
	 * @var array
	 */
	private $sc_allow_tag;

	/**Variable declaration
	 * $sc_block_tag.
	 *
	 * @var array
	 */
	private $sc_block_tag;

		/**
		 * Constructor checks if add-on has been enabled by the admin and initializes
		 * all the class variables. This function also defines all the hooks to
		 * hook into to make the add-on functionality work.
		 */
	protected function __construct() {
		$this->selected_country_type = get_sc_option( 'select_country_type' ) ? get_sc_option( 'select_country_type' ) : '';
		$this->is_country_allowed    = get_sc_option( 'selected_country_list' ) ? get_sc_option( 'selected_country_list' ) : '';
		$this->is_country_blocked    = get_sc_option( 'block_selected_country_list' ) ? get_sc_option( 'block_selected_country_list' ) : '';
		$this->sc_allow_tag          = 'select_countries_to_show';
		$this->sc_block_tag          = 'select_countries_to_block';

		add_action( 'admin_enqueue_scripts', array( $this, 'miniorange_register_selected_country_script' ) );
		add_action( 'admin_init', array( $this, 'check_addon_options' ), 2 );
		add_filter( 'selected_countries', array( $this, 'mo_selected_countries' ), 2, 1 );
		add_filter( 'mo_blocked_phones', array( $this, 'blocked_numbers' ), 1, 2 );

	}
	/**
	 * Checks addon option
	 *
	 * @return void
	 */
	public function check_addon_options() {
		if ( isset( $_POST['option'] ) && MoUtility::sanitize_check( 'option', $_POST ) == 'mo_selected_countrycode_value' ) {  // phpcs:ignore --.
			$this->handle_addon_options();
		}
	}
	/**
	 * Adds selected countries in array
	 *
	 * @param array $countriesavail .
	 * @return array
	 */
	public function mo_selected_countries( $countriesavail ) {
		unset( $countriesavail[0] );
		update_sc_option( 'allcountrywithcountrycode', $countriesavail );

		if ( $this->selected_country_type === $this->sc_allow_tag ) {
			$selected_countries_list = array_filter( array_map( 'trim', preg_split( '/\s*;\s*/', (string) $this->is_country_allowed ) ) );
			$selected_countries      = array();

			if ( ! empty( $selected_countries_list ) ) {
				$country_by_name = array();
				foreach ( $countriesavail as $value ) {
					if ( isset( $value['name'] ) ) {
						$country_by_name[ strtolower( trim( $value['name'] ) ) ] = $value;
					}
				}

				foreach ( $selected_countries_list as $value1 ) {
					$lookup_key = strtolower( $value1 );
					if ( isset( $country_by_name[ $lookup_key ] ) ) {
						$selected_countries[] = $country_by_name[ $lookup_key ];
					}
				}
			}

			$selected_countries = $selected_countries ? $selected_countries : $countriesavail;
			return $selected_countries;

		} elseif ( $this->selected_country_type === $this->sc_block_tag ) {

			$selected_countries_block_list = array_filter( array_map( 'trim', preg_split( '/\s*;\s*/', (string) $this->is_country_blocked ) ) );
			$selected_countries_block      = $countriesavail;
			if ( ! empty( $selected_countries_block_list ) ) {
				foreach ( $countriesavail as $key => $value ) {
					$name = isset( $value['name'] ) ? trim( $value['name'] ) : '';
					foreach ( $selected_countries_block_list as $value1 ) {
						if ( strtolower( $value1 ) === strtolower( $name ) ) {
							unset( $selected_countries_block[ $key ] );
							break;
						}
					}
				}
			}
			$selected_countries_block = $selected_countries_block ? $selected_countries_block : $countriesavail;
			return $selected_countries_block;

		}

		return $countriesavail;

	}

	/**
	 * Starts With
	 *
	 * @param string $string .
	 * @param string $start_string .
	 * @return string
	 */
	public function starts_with( $string, $start_string ) {
		$len = strlen( $start_string );
		return ( substr( $string, 0, $len ) === $start_string );
	}
	/**
	 * Returns blocked numbers
	 *
	 * @param array $blocked_phone_numbers .
	 * @param array $phone_number .
	 * @return array
	 */
	public function blocked_numbers( $blocked_phone_numbers, $phone_number ) {
		$numbers                 = explode( '+', $phone_number );
		$selected_countries_code = explode( ';', $this->is_country_allowed );
		foreach ( $selected_countries_code as $key => $value ) {
			if ( $this->starts_with( $numbers[1], $value ) ) {
				return $blocked_phone_numbers;
			} else {
				continue;
			}
		}
		array_push( $blocked_phone_numbers, $phone_number );
		return $blocked_phone_numbers;
	}

	/**
	 * This function registers the js file for changins selected countory textarea.
	 */
	public function miniorange_register_selected_country_script() {
		wp_register_script( 'moscountry', MOV_URL . 'addons/countrycode/includes/js/moscountry.min.js', array( 'jquery' ), MOV_VERSION, true );
		wp_localize_script(
			'moscountry',
			'moscountryvar',
			array(
				'siteURL' => wp_ajax_url(),

			)
		);
		wp_enqueue_script( 'moscountry' );
	}

	/**
	 * Handles Addon Options
	 *
	 * @return void
	 */
	public function handle_addon_options() {
		if ( ! check_admin_referer( 'mo_admin_actions' ) ) {
			return;
		}
		$data = MoUtility::mo_sanitize_array( $_POST );

		$this->selected_country_type = MoUtility::sanitize_check( 'mo_customer_validation_sc_type', $data );
		$this->is_country_allowed    = MoUtility::sanitize_check( 'mo_selected_country_numbers', $data );
		$this->is_country_blocked    = MoUtility::sanitize_check( 'mo_block_selected_country_numbers', $data );

		// Validate dropdown and default-country constraints against current inputs.
		if ( ! $this->validate_default_country_settings() ) {
			return;
		}

		update_sc_option( 'select_country_type', $this->selected_country_type );
		update_sc_option( 'selected_country_list', $this->is_country_allowed );
		update_sc_option( 'block_selected_country_list', $this->is_country_blocked );
	}

	/**
	 * Validate settings before saving addon options.
	 * Ensures dropdown is enabled and the default country is compatible with
	 * the selected allow/block lists. Emits admin errors and returns false on
	 * violation; returns true when validation passes.
	 *
	 * @return bool True if valid; false otherwise
	 */
	private function validate_default_country_settings() {
		$default_country_name = '';
		$default_country_data = CountryList::get_default_country_data();
		if ( ! MoUtility::is_blank( $default_country_data ) && isset( $default_country_data['name'] ) ) {
			$default_country_name = $default_country_data['name'];
		} else {
			$default_country_code = CountryList::get_default_countrycode();
			if ( ! MoUtility::is_blank( $default_country_code ) ) {
				foreach ( CountryList::get_countrycode_list() as $c ) {
					if ( isset( $c['countryCode'] ) && $c['countryCode'] === $default_country_code ) {
						$default_country_name = isset( $c['name'] ) ? $c['name'] : '';
						break;
					}
				}
			}
		}

		if ( MoUtility::is_blank( $default_country_name ) ) {
			return true; // No default configured; nothing to validate.
		}

		$allowed_countries = MoUtility::is_blank( $this->is_country_allowed ) ? array() : array_filter( array_map( 'trim', explode( ';', $this->is_country_allowed ) ) );
		$blocked_countries = MoUtility::is_blank( $this->is_country_blocked ) ? array() : array_filter( array_map( 'trim', explode( ';', $this->is_country_blocked ) ) );

		$settings_url = add_query_arg( array( 'page' => 'otpsettings' ), admin_url( 'admin.php' ) );
		if ( $this->selected_country_type === $this->sc_allow_tag && ! in_array( $default_country_name, $allowed_countries, true ) ) {
			$message = '<b>Default Country</b>: ' . esc_html( $default_country_name ) . ' must be included in the <b>Selected Countries</b> list. Update it in the <a href="' . esc_url( $settings_url ) . '" target="_blank" class="font-semibold">OTP Settings</a> or change your selection.';
			do_action( 'mo_registration_show_message', $message, 'ERROR' );
			return false;
		}

		if ( $this->selected_country_type === $this->sc_block_tag && in_array( $default_country_name, $blocked_countries, true ) ) {
			$message = '<b>Default Country</b>: ' . esc_html( $default_country_name ) . ' cannot be added to the <b>Blocked Countries</b> list. Remove it or change the default selection in <a href="' . esc_url( $settings_url ) . '" target="_blank" class="font-semibold">OTP Settings</a>.';
			do_action( 'mo_registration_show_message', $message, 'ERROR' );
			return false;
		}

		return true;
	}
	/**
	 * Gives selected country allowed tags
	 *
	 * @return array
	 */
	public function get_is_enabled() {
		return $this->sc_allow_tag; }
	/**
	 * Gives blocked country allowed tags
	 *
	 * @return array
	 */
	public function get_is_block_country_enabled() {
		return $this->sc_block_tag; }
	/**
	 * Checks if country is allowed
	 *
	 * @return array
	 */
	public function get_is_country_allowed() {
		return $this->is_country_allowed; }
	/**
	 * Checks if country is allowed
	 *
	 * @return array
	 */
	public function get_is_country_blocked() {
		return $this->is_country_blocked; }
	/**
	 * Gives selected country type
	 *
	 * @return array
	 */
	public function get_sc_type() {
		return $this->selected_country_type; }
}
