<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Change these to your email settings
    $to = "owolabi.office@gmail.com";
    $subject = "New Message from Contact Form";
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo "Message sent successfully.";
    } else {
        echo "Message delivery failed.";
    }
} else {
    echo "Invalid request.";
}
?>
