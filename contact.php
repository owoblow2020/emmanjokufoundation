<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Please fill out all required fields and provide a valid email address.";
    exit;
}

// Set the recipient email address
$to = 'owolabi.upload@gmail.com'; // Replace this with your own email address

// Sanitize input data
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Compose the email message
$body = "You have received a new message from your website contact form.\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n";
$body .= "Message:\n$message\n";

// Set the email headers
$headers = "From: $name <$email>\r\nReply-To: $email\r\n";

// Send the email
if(mail($to, $subject, $body, $headers)) {
    http_response_code(200);
    echo "Your message has been sent. Thank you!";
} else {
    http_response_code(500);
    echo "Oops! Something went wrong and we couldn't send your message.";
}
?>
