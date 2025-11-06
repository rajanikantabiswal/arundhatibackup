<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if ($name && $email && $message) {
        // Recipient email
        $to = "singhswagatika23@gmail.com"; 

        // Email subject and message for the receiver
        $subject = "New Contact Form Submission";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";

        // Headers for the receiver email
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send email to the receiver
        if (mail($to, $subject, $body, $headers)) {
            // Confirmation email to the user
            $user_subject = "Thank you for contacting us!";
            $user_body = "Hi $name,\n\nThank you for reaching out. We have received your message and will get back to you soon.\n\nBest regards,\nYour Company Name";

            // Headers for the confirmation email
            $user_headers = "From: no-reply@example.com\r\n"; // Change to a no-reply or support email address
            $user_headers .= "Reply-To: no-reply@example.com\r\n";

            // Send confirmation email to the user
            mail($email, $user_subject, $user_body, $user_headers);

            // Display a success message
            echo "Thank you for contacting us. A confirmation email has been sent to you.";
        } else {
            // Display an error message if the email to the receiver fails
            echo "There was an error sending your message. Please try again later.";
        }
    } else {
        // Display an error message if validation fails
        echo "Please fill out the form correctly.";
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: contact_form.html");
    exit();
}
?>
