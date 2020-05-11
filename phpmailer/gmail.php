<?php
use phpmailer;
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'mx1.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'email@pinoyplay.online';
$mail->Password = 'bcqrr2018';
$mail->setFrom('email@pinoyplay.online', 'admin pinoyplay');
$mail->addReplyTo('reply-email@pinoyplay.online', 'admin pinoyplay');
$mail->addAddress('mj.remetio001@gmail.com', 'mark joseph');
$mail->Subject = 'PHPMailer SMTP message';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->AltBody = 'This is a plain text message body';
$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>