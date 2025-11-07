<?php

add_action('wp_footer', function () {
    if (!is_product()) return;

    global $product;
    $product_id = $product->get_id();

    $purity = get_post_meta($product_id, '_gold_purity', true);
    $net_weight = floatval(get_post_meta($product_id, '_net_weight', true));
    $making_charge = floatval(get_post_meta($product_id, '_making_charge', true));
    $rates = get_option('gold_rates');
    $rate = isset($rates[$purity]) ? floatval($rates[$purity]) : 0;

    if (!$rate || !$net_weight) return;

    $gold_value = $rate * $net_weight;
    $making_value = $gold_value * ($making_charge / 100);
    $final_price = $gold_value + $making_value;
    ?>

    <style>
        #priceBreakupModal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items:center;
            
        }
        #priceBreakupContent {
            background: #fff;
            padding: 20px;
            width: 90%;
            max-width: 400px;
            margin: 10% auto;
            border-radius: 10px;
        }
        #priceBreakupClose {
            float: right; cursor: pointer; font-size: 18px;
        }
    </style>

    <div id="priceBreakupModal">
        <div id="priceBreakupContent">
            <span id="priceBreakupClose">&times;</span>
            <h3>Price Breakdown</h3>
            <ul>
                <li><strong>Purity:</strong> <?= strtoupper($purity) ?></li>
                <li><strong>Gold Rate:</strong> ₹<?= number_format($rate, 2) ?>/g</li>
                <li><strong>Net Weight:</strong> <?= $net_weight ?>g</li>
                <li><strong>Gold Value:</strong> ₹<?= number_format($gold_value, 2) ?></li>
                <li><strong>Making Charges (<?= $making_charge ?>%):</strong> ₹<?= number_format($making_value, 2) ?></li>
                <li><strong>Total:</strong> ₹<?= number_format($final_price, 2) ?></li>
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.createElement('button');
        btn.innerHTML = 'View Price Breakdown';
        btn.style.cssText = `
            color: black;
    background: #ffdddd;
    padding: 0 10px;
    border: none;
    font-size: 12px;
    border-radius: 0;`;




            const priceContainer = document.querySelector('.summary .price');
            if (priceContainer) {
                const wrapper = document.createElement('div');
    wrapper.style.cssText = `
        width: 100%;
    `;

    wrapper.appendChild(btn);
    priceContainer.appendChild(wrapper);
            }

            const modal = document.getElementById('priceBreakupModal');
            const close = document.getElementById('priceBreakupClose');
            btn.addEventListener('click', () => modal.style.display = 'flex');
            close.addEventListener('click', () => modal.style.display = 'none');
            window.addEventListener('click', (e) => {
                if (e.target == modal) modal.style.display = 'none';
            });
        });
    </script>
<?php
});
