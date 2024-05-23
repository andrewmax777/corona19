<?php
// Basic input validation and sanitization
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone'])) {
    echo "Please fill in all required fields.";
    exit;
}

$name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Sanitize with FILTER_SANITIZE_FULL_SPECIAL_CHARS
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$guest = filter_var($_POST['phone'], FILTER_VALIDATE_INT);
$message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Sanitize with FILTER_SANITIZE_FULL_SPECIAL_CHARS

// Compose email content
$subject = "New Appointment request from $name";
$body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message\n";

// Send email using PHP's mail function
if (mail("suraiyaaysha360@gmail.com", $subject, $body)) {
    // Redirect to the original page with a success message
    header("Location: thankyou.html?success=1");
    exit;
} else {
    echo "Failed to send email.";
}

?>
