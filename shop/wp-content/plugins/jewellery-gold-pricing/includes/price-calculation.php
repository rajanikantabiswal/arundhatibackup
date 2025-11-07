<?php

add_filter('woocommerce_product_get_price', 'calculate_dynamic_gold_price', 10, 2);
add_filter('woocommerce_product_get_regular_price', 'calculate_dynamic_gold_price', 10, 2);

function calculate_dynamic_gold_price($price, $product) {
    $purity = get_post_meta($product->get_id(), '_gold_purity', true);
    $net_weight = floatval(get_post_meta($product->get_id(), '_net_weight', true));
    $making_charge = floatval(get_post_meta($product->get_id(), '_making_charge', true));

    $rates = get_option('gold_rates');
    $rate = isset($rates[$purity]) ? floatval($rates[$purity]) : 0;

    if ($rate && $net_weight) {
        $gold_price = $rate * $net_weight;
        $final_price = $gold_price + ($gold_price * $making_charge / 100);
        return round($final_price, 2);
    }

    return $price;
}
