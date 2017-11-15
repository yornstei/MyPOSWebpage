<?php
include 'header.php';

echo '<h1>Thanks for contacting us.</h1>';

require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'yehudaornstein';
$mail->Password = 'shltSHLT1';
$mail->setFrom('yehudaornstein@gmail.com');
$mail->addAddress($_POST['emailAddress']);
$mail->Subject = $_POST['title'].'-From: '.$_POST['customerName'];
$mail->Body = $_POST['about'];
//send the message, check for errors
if (!$mail->send()) {
    echo "ERROR: " . $mail->ErrorInfo;
} else {
    echo "SUCCESS - your message was sent.";
}

include 'footer.php';