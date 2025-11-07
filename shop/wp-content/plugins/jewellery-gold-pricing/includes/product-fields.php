<?php

add_action('woocommerce_product_options_general_product_data', function () {
    woocommerce_wp_select([
        'id' => '_gold_purity',
        'label' => 'Gold Purity',
        'options' => ['' => 'Select', '24k' => '24K', '22k' => '22K', '18k' => '18K', 'silver' => 'silver'],
    ]);
    woocommerce_wp_text_input([
        'id' => '_gross_weight',
        'label' => 'Gross Weight (g)',
        'type' => 'number',
        'custom_attributes' => ['step' => '0.01'],
    ]);
    woocommerce_wp_text_input([
        'id' => '_net_weight',
        'label' => 'Net Weight (g)',
        'type' => 'number',
        'custom_attributes' => ['step' => '0.01'],
    ]);
    woocommerce_wp_text_input([
        'id' => '_making_charge',
        'label' => 'Making Charge (%)',
        'type' => 'number',
        'custom_attributes' => ['step' => '0.1'],
    ]);
});

add_action('woocommerce_process_product_meta', function ($post_id) {
    foreach (['_gold_purity', '_gross_weight', '_net_weight', '_making_charge'] as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
});
