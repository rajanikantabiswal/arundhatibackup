<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              ifelsetech.com
 * @since             22.03.10
 * @package           Jewellery_Price
 *
 * @wordpress-plugin
 * Plugin Name:         ITS Jewellery Price Pro
 * Plugin URI:          https://www.ifelsetech.com/its-jewellery-price-plugin/
 * Description:         ITS Jewellery Price Plugin for Woocommerce helps to update prices of jewellery products. We all know that prices of jewellery products change everyday based on prices of precious metals such as Gold and Diamond. Changing the price of each product is a big task that needs human resources and time. With our plugin you need to only update the prices of precious metals. The plugin will take care of updating the prices of the jewellery products.

 * Version:             25.06.17
 * Requires at least:   5.8.2
 * Tested up to:        6.8.1
 * Requires PHP:        7.4, 8.1, 8.2, 8.3, 8.4
 * Author:              Ifelse
 * Author URI:          https://ifelsetech.com
 * License:             
 * License URI:        

 * Text Domain:         jewellery-price
 * Domain Path:         /languages 
 * 
 * 
 */
defined( 'ABSPATH' ) || exit;



function itsjp_check_php_version() {
    // Required PHP versions
    $required_php_versions = ['7.4', '8.1', '8.2', '8.3', '8.4'];
    // Get the current PHP version
    $current_php_version = phpversion();

    // Check if the current PHP version is not in the required versions
    if (!in_array(substr($current_php_version, 0, 3), $required_php_versions)) {
        // Build the error message using the variable
        $error_message = 'This plugin requires PHP ' . implode(', ', $required_php_versions) . '. ';
        $error_message .= 'Current PHP version: ' . $current_php_version . '.';

        return $error_message;
    }

    return '';
}

function itsjp_check_ioncube_loader() {
    // Check if ionCube Loader is enabled
    $is_ioncube_loaded = extension_loaded('ionCube Loader');

    if (!$is_ioncube_loaded) {
        // Build the error message
        $error_message = 'This plugin requires ionCube Loader to be enabled.';

        return $error_message;
    }

    return '';
}



function validate_plugin_environment() {
    $error_messages = [];

    $php_version_error = itsjp_check_php_version();
    if ($php_version_error) {
        $error_messages[] = $php_version_error;
    }

    $ioncube_error = itsjp_check_ioncube_loader();
    if ($ioncube_error) {
        $error_messages[] = $ioncube_error;
    }

    if (!empty($error_messages)) {
         // Display admin notices
				 add_action('admin_notices', function() use ($error_messages) {
					echo '<div class="notice notice-error is-dismissible">';
					echo '<h2>ITS Jewellery Price Pro Plugin Requirements Not Met</h2>';
					echo '<ul>';
					foreach ($error_messages as $error_message) {
							echo '<li>' . $error_message . '</li>';
					}
					echo '</ul>';
					echo '</div>';
			});
    }
}



// Hook into admin_init to check the environment on admin page load
add_action('admin_init', 'validate_plugin_environment');


// Important Constants

define( 'JEWELLERY_PRICE_PRO_VERSION', '25.06.17' );
define( 'JEWELLERY_PRICE_PRO_PLUGIN_URL', plugin_dir_url(__FILE__));
define( 'JEWELLERY_PRICE_PRO_PLUGIN_PATH', plugin_dir_path(__FILE__) );
if ( ! defined( 'ITSJPP_PRO_PLUGIN_FILE' ) ) {
	define( 'ITSJPP_PRO_PLUGIN_FILE', __FILE__ );
}
if ( ! defined( 'ITSJPP_PRO_PLUGIN_BASENAME' ) ) {
	define( 'ITSJPP_PRO_PLUGIN_BASENAME', plugin_basename( ITSJPP_PRO_PLUGIN_FILE ));
}
if ( ! defined( 'ITSJPP_LANG' ) ) {
	define( 'ITSJPP_LANG', 'jewellery-price');
}


require_once(plugin_dir_path(__FILE__)."api/itsjp-api.php");
require_once(plugin_dir_path(__FILE__)."add-ons/itsapu/itsapu.php");
require_once(plugin_dir_path(__FILE__)."its-jewellery-price-pro-starter.php");