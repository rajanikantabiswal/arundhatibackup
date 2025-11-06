<?php
// The absolute server path to your project root
define('ROOT_PATH', dirname(__FILE__));

// Automatically detect BASE_URL (works for HTTP & HTTPS)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

// If your project is in a subfolder, add it here:
$subfolder = ''; // Example: '/myproject' if needed

define('BASE_URL', $protocol . '://' . $host . $subfolder);
