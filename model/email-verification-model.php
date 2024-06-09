<?php

include_once "../config/connection.php";

// Sanitize email input
$emailInput = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

// Sanitize verification code input
$verificationInput = $_POST['verificationCode'];
if (!preg_match('/^\d{6}$/', $verificationInput)) {
    // Invalid verification code format
    echo "<script>alert('Invalid verification code format.');history.go(-1);</script>";
    die();
}

// Bring the verification code from database
$conn = $dbh->prepare("SELECT verificationCode FROM users WHERE email = ?");
$conn->execute([$emailInput]);
$code = $conn->fetch(PDO::FETCH_ASSOC);

$verificationCode = $code['verificationCode'];

if ($verificationCode == $verificationInput) {

    $updateTable = $dbh->prepare("UPDATE users SET verificated = ? WHERE email = ?");
    $updateTable->execute([1, $emailInput]);

    echo "<script>alert('Your email has been successfully updated.');</script>";
    echo "<script>window.location='../dashboard/my-profile';</script>";
    exit();
} else {
    echo "<script>alert('Verification code does not match with the one we provided. Please check again.');history.go(-1);</script>";
    die();
}