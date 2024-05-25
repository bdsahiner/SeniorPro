<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include_once "../config/connection.php";

if (isset($_POST['userEmail'])) {

    // Get the email input
    $emailAddress = trim($_POST['userEmail']);

    // Bring email address from users table to check if email is registered
    $emailQuery = "SELECT * FROM users WHERE email = ?";
    $emailCheck = $dbh->prepare($emailQuery);
    $emailCheck->execute([$emailAddress]);
    $emailValidation = $emailCheck->fetch(PDO::FETCH_ASSOC);
    $validEmail = $emailValidation['email'];

    // IF email is valid
    if ($validEmail == $emailAddress) {

        // Create a verification code
        $verificationCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Get ID of the user
        $queryCheck = "SELECT id FROM users WHERE `email` = ?";
        $checkID = $dbh->prepare($queryCheck);
        $checkID->execute([$emailAddress]);
        $bring = $checkID->fetch(PDO::FETCH_ASSOC);
        $userId = $bring['id'];

        // Set the current date for capturing the time of request
        $date = date("Y-m-d H:i:s");

        // Insert the data to "pwreset" table to make verification functions
        $queryInsert = "INSERT INTO pwreset SET `email` = ?, `verificationCode` = ?, `requestDate` = ?, userId = ?";

        // Check if connection was successful
        $conn = $dbh->prepare($queryInsert);
        if ($conn->execute([$emailAddress, $verificationCode, $date, $userId])) {

            // Necessary information for sending verification code to user email
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
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            // IF all successful, direct user to verification page
            header("Location: ../login/reset-verification?email=" . $emailAddress);

        } else {
            echo "<script>alert('There was a problem inserting data to database.');history.go(-1);</script>";
        }

    } else {
        echo "<script>alert('Please make sure you entered the correct email address.');history.go(-1);</script>";
        die();
    }
}