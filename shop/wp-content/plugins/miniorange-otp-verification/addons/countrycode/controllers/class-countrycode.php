<?php
/**
 * Custom messages controller.
 *
 * @package miniorange-otp-verification/addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use OTP\Addons\CountryCode\Handler\SelectedCountryCode;
use OTP\Handler\MoActionHandlerHandler;
use OTP\Helper\MoFormDocs;

$handler                           = SelectedCountryCode::instance();
$admin_handler                     = MoActionHandlerHandler::instance();
$sc_type                           = $handler->get_sc_type();
$sc_enabled                        = $handler->get_is_enabled();
$sc_block                          = $handler->get_is_block_country_enabled();
$nonce                             = $admin_handler->get_nonce_value();
$otp_selected_countries_list       = $handler->get_is_country_allowed();
$otp_block_selected_countries_list = $handler->get_is_country_blocked();
$nonce                             = $admin_handler->get_nonce_value();
$guide_link                        = MoFormDocs::SELECTED_COUNTRY_CODE_ADDON_LINK['guideLink'];

require SC_DIR . 'views/countrycode.php';
