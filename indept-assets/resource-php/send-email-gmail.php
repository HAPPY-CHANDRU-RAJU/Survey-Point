<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";

$mail = new PHPMailer(true);
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

$mail->SMTPDebug = 3;  
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

//auth credential information
$mail->Username = "";
$mail->Password = "";

$mail->IsHTML(true);
$mail->SingleTo = true;

$mail->setFrom('', 'Survey Point'); #your email id
