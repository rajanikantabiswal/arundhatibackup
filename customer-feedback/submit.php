<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $storeLocation = $_POST['store_location'];

    $customerName = $_POST['customer_name'];

    $customerEmail = $_POST['customer_email'];

    $customerPhone = $_POST['customer_phone'];

    $welcomed = $_POST['welcomed'];

    $escorted = $_POST['escorted'];

    $staffBehavior = $_POST['staff_behavior'];

    $productFound = $_POST['product_found'];
    $downloadApp = $_POST['download_app'];

    $productType = $_POST['product_type'] ?? '';

    $billingSpeed = $_POST['billing_speed'] ?? '';

    $cashierThanks = $_POST['cashier_thanks'] ?? '';

    $productInquiry = $_POST['product_inquiry'] ?? '';

    $comments = $_POST['comments'];



    $webAppUrl = 'https://script.google.com/macros/s/AKfycby6ltnwbpRBttzIBqJAGQUpkNNDuVQxYGDlD4XFZOw4wTQAxbdxxIAF0PuLK0ufE6nt/exec';



    $data = [
        'store_location' => $storeLocation,
        'customer_name' => $customerName,

        'customer_email' => $customerEmail,

        'customer_phone' => $customerPhone,

        'welcomed' => $welcomed,

        'escorted' => $escorted,

        'staff_behavior' => $staffBehavior,

        'product_found' => $productFound,

        'download_app' => $downloadApp,

        'product_type' => $productType,

        'billing_speed' => $billingSpeed,

        'cashier_thanks' => $cashierThanks,

        'product_inquiry' => $productInquiry,

        'comments' => $comments

    ];



    $options = [

        'http' => [

            'header'  => "Content-type: application/json\r\n",

            'method'  => 'POST',

            'content' => json_encode($data),

        ],

    ];

    $context  = stream_context_create($options);

    $result = file_get_contents($webAppUrl, false, $context);



    if ($result === FALSE) {

        die('Error sending data to Google Sheet');
    }



    echo 'Thank you for your feedback!';
}
