<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['submitInform'])) {

    // User Info for logs
    $userId = $_SESSION['id'];
    $bringName = $dbh->prepare("SELECT * FROM users WHERE id = ?");
    $bringName->execute([$userId]);
    $userFullName = $bringName->fetch(PDO::FETCH_ASSOC);

    // Input variables
    $emailInput = trim($_POST['users']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Email credentials
    $appPassword = 'vblo xplu zkuw ipot';
    $sender = 'bluecollarinsight@gmail.com';
    $body = $message;

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
        $mail->addAddress($emailInput);     //Add a recipient
        $mail->addReplyTo($sender, 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();

        $log->add($userFullName['fullName'] . ' sent an informational form to ' . $emailInput . ' from the IP address ' . $ipAddress . '.');

        echo "<script>alert('Successfully submitted.');history.go(-1);</script>";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}