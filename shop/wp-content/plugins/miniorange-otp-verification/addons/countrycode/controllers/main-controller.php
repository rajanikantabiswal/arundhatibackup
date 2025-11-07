<?php
/**
 * Custom messages controller.
 *
 * @package miniorange-otp-verification/addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use OTP\Addons\CountryCode\Handler\SelectedCountry;
use OTP\Helper\MoConstants;
use OTP\Helper\MoUtility;



$handler         = SelectedCountry::instance();
$registered      = $handler->moAddOnV();
$mle             = MoUtility::mllc();
$disabled        = ( ! $registered ) || ( $mle['STATUS'] ) ? 'disabled' : '';
$mo_current_user = wp_get_current_user();
$controller      = SC_DIR . 'controllers/';
$req_url         = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : ''; // phpcs:ignore -- false positive.
$addon           = add_query_arg( array( 'page' => 'addon' ), remove_query_arg( 'addon', $req_url ) ); // phpcs:ignore -- false positive.

if ( isset( $_GET['addon'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.NonceVerification.Recommended -- Reading GET parameter from the URL for checking the addon name, doesn't require nonce verification.
	switch ( $_GET['addon'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing, WordPress.Security.NonceVerification.Recommended -- Reading GET parameter from the URL for checking the addon name, doesn't require nonce verification.
		case 'selectedcountrycode':
			include $controller . 'class-countrycode.php';
			break;
	}
}
