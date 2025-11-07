<?php

add_action('admin_menu', function () {
    add_menu_page(
        'Gold Rates',
        'Gold Rates',
        'manage_options',
        'gold-rates',
        'render_gold_rates_page',
        'dashicons-money-alt',
        60
    );
});

function render_gold_rates_page()
{
    if (isset($_POST['gold_rates'])) {
        update_option('gold_rates', $_POST['gold_rates']);
        echo '<div class="updated"><p>Gold rates updated.</p></div>';

        // Clear WooCommerce price cache for all products
        global $wpdb;
        $product_ids = $wpdb->get_col("SELECT ID FROM {$wpdb->prefix}posts WHERE post_type = 'product' AND post_status = 'publish'");
        foreach ($product_ids as $product_id) {
            wc_delete_product_transients($product_id);
            do_action('woocommerce_product_object_updated_props', wc_get_product($product_id));
        }
    }

     $saved_rates = get_option('gold_rates', []);
    $default_rates = ['24k' => '', '22k' => '', '18k' => '', 'silver' => ''];
    $rates = array_merge($default_rates, $saved_rates);
?>
    <div class="wrap">
        <h1>Update Gold Rates</h1>
        <form method="POST">
            <?php foreach ($rates as $k => $v): ?>
                <p>
                    <label><?= strtoupper($k) ?> Rate (per gram):</label>
                    <input type="number" step="0.01" name="gold_rates[<?= $k ?>]" value="<?= esc_attr($v) ?>" required>
                </p>
            <?php endforeach; ?>
            <p><input type="submit" class="button-primary" value="Save Rates"></p>
        </form>
    </div>
<?php
}


add_action('rest_api_init', function () {
    register_rest_route('jewellery/v1', '/gold-rates', [
        'methods' => 'GET',
        'callback' => 'get_gold_rates_public',
        'permission_callback' => '__return_true',  // public API
    ]);
});

function get_gold_rates_public()
{
    $rates = get_option('gold_rates', []);
    return rest_ensure_response([
        'success' => true,
        'rates' => $rates,
    ]);
}
