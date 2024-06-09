<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['userEmail'])) {

    // Input data
    $fullName = trim($_POST['userName']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $taxID = trim($_POST['taxID']);
    $emailAddress = trim($_POST['userEmail']);
    $companyName = trim($_POST['companyName']);
    $password = trim($_POST['userPw']);
    $hashedPassword = sha1($password);

    $checker = $dbh->prepare("SELECT * FROM users WHERE email = ?");
    $checker->execute([$emailAddress]);
    $emailValidation = $checker->fetch(PDO::FETCH_ASSOC);

    // After register, create employerId for companies table
    $idCheck = $dbh->prepare("SELECT id FROM users ORDER BY id DESC");
    $idCheck->execute();
    $bringID = $idCheck->fetch(PDO::FETCH_ASSOC);
    $lastID = $bringID['id'];
    $userId = $lastID + 1;

    // Check
    if ($emailValidation['email'] == $emailAddress) {
        echo "<script>alert('This email address has already been registered. Please use another email.');history.go(-1);</script>";
        die();
    }

    $verificationCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

    $conn = $dbh->prepare("INSERT INTO users SET `fullName` = ?, `phoneNumber` = ?, `email` = ?, `password` = ?, `verificationCode` = ?, `active` = ?, `employer` = ?");
    if ($conn->execute([$fullName, $phoneNumber, $emailAddress, $hashedPassword, $verificationCode, 0, 1])) {

        $updateCompanies = $dbh->prepare("INSERT INTO companies SET employerId = ?, companyName = ?, taxNumber = ?, verified = ?");
        $updateCompanies->execute([$userId, $companyName, $taxID, 0]);

        $appPassword = 'vblo xplu zkuw ipot';
        $sender = 'bluecollarinsight@gmail.com';
        $body = 'Your verification code: ' . $verificationCode;

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
            $mail->addAddress($emailAddress);     //Add a recipient
            $mail->addReplyTo($sender, 'Information');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification';
            $mail->Body = $body;

            $mail->send();

            $log->add($fullName . ' submitted an employer registration form from the IP address ' . $ipAddress . '.');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header("Location: ../login/verification?email=" . $emailAddress);

    } else {
        echo "<script>alert('There was a problem inserting data to database.');history.go(-1);</script>";
    }

}
