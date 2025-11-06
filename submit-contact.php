<?php
// Include PHPMailer files (manual method)
require 'vendor/Exception.php';
require 'vendor/PHPMailer.php';
require 'vendor/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set header for JSON
header('Content-Type: application/json');

// Initialize response
$response = [];

// Check if POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Sanitize input
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate
$errors = [];
if (empty($name)) $errors[] = 'Name is required';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email required';
if (empty($phone) || !preg_match('/^[0-9]{10}$/', $phone)) $errors[] = 'Phone must be 10 digits';
if (empty($message)) $errors[] = 'Message is required';

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

// Email info
$to = "info@arundhatijewellers.com";
$subject = "Arundhati Jewellers - New Contact Enquiry";

// Email body
$emailBody = "
<!DOCTYPE html>
<html>
<head>
<style>
body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
.container { max-width: 600px; margin: 0 auto; padding: 20px; }
.header { background-color: #000; color: #fff; padding: 20px; text-align: center; }
.content { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
.field { margin-bottom: 15px; }
.label { font-weight: bold; color: #000; }
.value { margin-top: 5px; padding: 10px; background-color: #fff; border-left: 3px solid #000; }
.footer { text-align: center; margin-top: 20px; font-size: 12px; color: #666; }
</style>
</head>
<body>
    <div class='container'>
        <div class='header'><h2>New Contact Enquiry</h2></div>
        <div class='content'>
            <div class='field'><div class='label'>Name:</div><div class='value'>$name</div></div>
            <div class='field'><div class='label'>Email:</div><div class='value'>$email</div></div>
            <div class='field'><div class='label'>Phone:</div><div class='value'>$phone</div></div>
            <div class='field'><div class='label'>Message:</div><div class='value'>" . nl2br($message) . "</div></div>
        </div>
        <div class='footer'>
            <p>This enquiry was submitted from the Arundhati Jewellers contact form.</p>
            <p>Received on: " . date('F j, Y, g:i a') . "</p>
        </div>
    </div>
</body>
</html>
";

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();

    // ✅ Your Shared Hosting SMTP configuration
    $mail->Host = 'smtp.gmail.com';   // Usually this works for cPanel
    $mail->SMTPAuth = true;
    $mail->Username = 'info@arundhatijewellers.com'; // Change this
    $mail->Password = 'nexn tmcu qwkp xsnm';            // Change this
    $mail->SMTPSecure = 'ssl'; // or 'tls' if 587
    $mail->Port = 465; // 465 for SSL, 587 for TLS

    // Email headers
    $mail->setFrom('info@arundhatijewellers.com', 'Arundhati Jewellers');
    $mail->addAddress($to);
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $emailBody;
    $mail->AltBody = strip_tags($message);

    // Send mail
    $mail->send();

    $response['success'] = true;
    $response['message'] = 'Thank you for contacting us! We will get back to you soon.';

    // Optional logging
    file_put_contents('contact-logs.txt', date('Y-m-d H:i:s') . " - $name <$email>\n", FILE_APPEND);
} catch (Exception $e) {
    $response['success'] = false;
    $response['message'] = "Mailer Error: " . $mail->ErrorInfo;
    error_log('Contact form error: ' . $mail->ErrorInfo);
}

echo json_encode($response);
exit;
