<?php 
/*** Redux Framework ***/
require_once get_template_directory().'/admin/init.php';

/*** Theme Framework ***/
require_once get_template_directory().'/framework/init.php';

function custom_woocommerce_add_to_cart_text( $text, $product ) {
    return __('Buy Now', 'woocommerce'); // Change to your desired text
}
?>