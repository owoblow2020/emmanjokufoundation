<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.emmanjokufoundation.org";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "oolulegan@emmanjokufoundation.org";
$mail->Password = "Reset##3030";

$mail->setFrom($email, $name);
$mail->addAddress("owolabi.office@gmail.com", "Owolabi");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: sent.html");