<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'luzhiyang91@gmail.com';                 // SMTP username
$mail->Password = 'a9i1a00b';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = $_POST["sender_email"];
$mail->FromName = $_POST["sender_email"];
$mail->addAddress('lu_zhiyang@hotmail.com', 'Zhiyang Lu');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->isHTML(true);                                  // Set email format to HTML

$content = $_POST["sender_message"] . "<br/><br/><br/>" . $_POST["sender_name"] . "<br/>" . $_POST["sender_email"];
$contentcopy = $_POST["sender_message"] . "\n" . $_POST["sender_name"] . "\n" . $_POST["sender_email"];
$mail->Subject = 'Message from ' . $_POST["sender_name"] . ' via My HomePage';
$mail->Body    = $content;
$mail->AltBody = $contentcopy;

if(!$mail->send()) {
    echo "Message could not be sent. Please try again!";
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "Message has been sent.";
}