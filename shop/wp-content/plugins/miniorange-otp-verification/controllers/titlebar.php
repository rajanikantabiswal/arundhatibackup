<?php
/**
 * Titlebar controller.
 *
 * @package miniorange-otp-verification/controllers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use OTP\Helper\MoConstants;
use OTP\Helper\MoMessages;
use OTP\Objects\Tabs;
use OTP\Helper\MoUtility;
use OTP\Helper\FormList;

$request_uri                 = remove_query_arg( array( 'addon', 'form', 'subpage' ), isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '' ); // phpcs:ignore -- false positive.
$profile_url                 = add_query_arg( array( 'page' => $tab_details->tab_details[ Tabs::ACCOUNT ]->menu_slug ), $request_uri );
$help_url                    = MoConstants::FAQ_URL;
$nonce                       = $admin_handler->get_nonce_value();
$is_logged_in                = MoUtility::micr();
$is_activated                = MoUtility::mclv();
$is_free_plugin              = strcmp( MOV_TYPE, 'MiniOrangeGateway' ) === 0;
$gateway_type                = get_mo_option( 'custome_gateway_type' );
$modal_notice                = get_mo_option( 'mo_transaction_notice' );
$remaining_email             = get_mo_option( 'email_transactions_remaining' );
$remaining_sms               = get_mo_option( 'phone_transactions_remaining' );
$remaining_whatsapp          = get_mo_option( 'whatsapp_transactions_remaining', 'mowp_customer_validation_' );
$smtp_enabled                = get_mo_option( 'smtp_enable_type' );
$whatsapp_enabled            = get_mo_option( 'mo_whatsapp_enable' );
$mo_whatsapp_type_enabled    = get_mo_option( 'mo_whatsapp_type' );
$mo_sms_as_backup            = get_mo_option( 'mo_sms_as_backup' );
$mo_whatsapp_gateway_enabled = $whatsapp_enabled && $mo_whatsapp_type_enabled && 'mo_whatsapp' === $mo_whatsapp_type_enabled;
$mo_smtp_enabled             = $is_free_plugin || ( $smtp_enabled && 'mo_smtp_enable' === $smtp_enabled );
$license_plan                = get_mo_option( 'customer_license_plan' );
$remaining_total_txn         = $remaining_email + $remaining_sms;
$active_class                = $remaining_total_txn < 15 ? 'mo-active-notice-bar' : '';
$mo_transactions             = null;

// Compute transactions display text
if ( $is_logged_in ) {
	if ( $mo_whatsapp_gateway_enabled ) {
		if ( $is_free_plugin || ( 'MoGateway' === $gateway_type && $mo_smtp_enabled ) ) {
			$mo_transactions = 'WhatsApp: ' . esc_attr( $remaining_whatsapp ) . '  |  SMS: ' . esc_attr( $remaining_sms ) . ' | Email: ' . esc_attr( $remaining_email );
		} elseif ( 'MoGateway' === $gateway_type && ! $mo_smtp_enabled ) {
			$mo_transactions = 'WhatsApp: ' . esc_attr( $remaining_whatsapp ) . '  |  SMS: ' . esc_attr( $remaining_sms );
		} elseif ( 'MoGateway' !== $gateway_type && $mo_smtp_enabled ) {
			$mo_transactions = 'WhatsApp: ' . esc_attr( $remaining_whatsapp ) . '  | Email: ' . esc_attr( $remaining_email );
		} else {
			$mo_transactions = 'WhatsApp: ' . esc_attr( $remaining_whatsapp );
		}
	} elseif ( $is_free_plugin ) {
		$mo_transactions = 'SMS: ' . esc_attr( $remaining_sms ) . ' | Email: ' . esc_attr( $remaining_email );
	} elseif ( 'MoGateway' === $gateway_type ) {
		if ( $mo_smtp_enabled ) {
			$mo_transactions = 'SMS: ' . esc_attr( $remaining_sms ) . ' | Email: ' . esc_attr( $remaining_email );
		} else {
			$mo_transactions = 'SMS: ' . esc_attr( $remaining_sms );
		}
	} elseif ( $mo_smtp_enabled ) {
		$mo_transactions = 'Email: ' . esc_attr( $remaining_email );
	}
}

$hidden               = is_null( $mo_transactions ) ? 'hidden' : '';
$is_sms_notice_closed = get_mo_option( 'mo_hide_sms_notice' );
$show_sms_notice      = ( 'mo_hide_sms_notice' !== $is_sms_notice_closed );

// Country restriction addon reminder variables
$sc_last_dismissed = get_mo_option( 'mo_selected_country_modal_dismissed_ts' );
$sc_enabled        = get_mo_option( 'select_country_type', 'mo_sc_code_' );
$now_ts            = time();
$should_show_sc    = ( ! $sc_enabled ) && ( empty( $sc_last_dismissed ) || ( (int) $now_ts - (int) $sc_last_dismissed ) > ( 3 * DAY_IN_SECONDS ) );

$page                = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
$addon               = isset( $_GET['addon'] ) ? sanitize_text_field( wp_unslash( $_GET['addon'] ) ) : '';
$addon_settings_page = ( 'addon' === $page && 'selectedcountrycode' === $addon );
$req_url             = isset( $_SERVER['REQUEST_URI'] ) ? esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '';
$addon_sc_url        = add_query_arg(
	array(
		'page'  => 'addon',
		'addon' => 'selectedcountrycode',
	),
	$req_url
);

// Transaction Logs modal variables
$tl_last_dismissed = get_mo_option( 'mo_transaction_logs_modal_dismissed_ts' );
$tl_enabled        = get_mo_option( 'is_mo_report_enabled' );
$form_handler      = FormList::instance();
$enabled_forms     = $form_handler->get_enabled_forms();
$has_enabled_forms = ! empty( $enabled_forms );

$should_show_tl = ( ! $tl_enabled ) && $is_logged_in && $is_activated && ( 'moreporting' !== $page ) && ! $addon_settings_page && $has_enabled_forms && (
	empty( $tl_last_dismissed ) ||
	( (int) $now_ts - (int) $tl_last_dismissed ) > ( 7 * DAY_IN_SECONDS )
);
$reporting_url  = add_query_arg( array( 'page' => 'moreporting' ), $req_url );

// Low transaction alert variables
$should_show_low_txn_alert = false;
$low_txn_threshold_key     = null;
if ( $is_logged_in && is_array( $modal_notice ) && ( $remaining_sms + $remaining_email ) <= 50 && ( 'MoGateway' === $gateway_type || $is_free_plugin ) ) {
	$remaining_total = $remaining_sms + $remaining_email;
	foreach ( $modal_notice as $key => $value ) {
		if ( in_array( $value, $modal_notice, true ) && $remaining_total <= $value && $remaining_total >= $key ) {
			$should_show_low_txn_alert = true;
			$low_txn_threshold_key     = $key;
			break;
		}
	}
} else {
	$array = array(
		'21' => '50',
		'2'  => '10',
		'0'  => '1',
	);
	update_mo_option( 'mo_transaction_notice', $array );
}

require MOV_DIR . 'views/titlebar.php';
