<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

if (isset($_POST['submit'])) {

    $fullName = $_POST['name'];
    $emailInput = $_POST['email'];
    $subjectInput = $_POST['subject'];
    $comments = $_POST['comments'];

    $appPassword = 'vblo xplu zkuw ipot';
    $sender = 'bluecollarinsight@gmail.com';
    $body = 'Subject: ' . $subjectInput . '<br>' . 'Full Name: ' .  $fullName . '<br>' . 'From: ' . $emailInput . '<br>' . 'Message: <pre>' . $comments . '</pre>';

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = $sender;                    //SMTP username
        $mail->Password = $appPassword;                             //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sender);
        $mail->addAddress($sender);     //Add a recipient
        $mail->addReplyTo($sender, 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Contact Form';
        $mail->Body = $body;

        $mail->send();
        echo 'Message has been sent';

        echo '<script>alert("Successfully sent!");history.go(-1);</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}