<?php
/**
 * Autoload file for some common functions used all over the addon
 *
 * @package miniorange-otp-verification/addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SC_DIR', plugin_dir_path( __FILE__ ) );
define( 'SC_URL', plugin_dir_url( __FILE__ ) );
/**
 * This function is used to handle the add-ons get option call. A separate function has been created so that
 * we can manage getting of database values all from one place. Any changes need to be made can be made here
 * rather than having to make changes in all of the add-on files.
 *
 * Calls the mains plugins get_mo_option function.
 *
 * @param string      $string - option name.
 * @param bool|string $prefix - prefix for database keys.
 * @return String
 */
function get_sc_option( $string, $prefix = null ) {
	$string = ( null === $prefix ? 'mo_sc_code_' : $prefix ) . $string;
	return get_mo_option( $string, '' );
}

/**
 * This function is used to handle the add-ons update option call. A separate function has been created so that
 * we can manage getting of database values all from one place. Any changes need to be made can be made here
 * rather than having to make changes in all of the add-on files.
 *
 * Calls the mains plugins get_mo_option function.
 *
 * @param string      $option_name - key of the option name.
 * @param string      $value - value of the option.
 * @param null|string $prefix - prefix of the key for database entry.
 */
function update_sc_option( $option_name, $value, $prefix = null ) {
	$option_name = ( null === $prefix ? 'mo_sc_code_' : $prefix ) . $option_name;
	update_mo_option( $option_name, $value, '' );
}
