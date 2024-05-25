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
$conn = $dbh->prepare("SELECT verificationCode FROM pwreset WHERE email = ? ORDER BY requestDate DESC LIMIT 1");
$conn->execute([$emailInput]);
$code = $conn->fetch(PDO::FETCH_ASSOC);

$verificationCode = $code['verificationCode'];

if ($verificationCode == $verificationInput) {

    $updateTable = $dbh->prepare("UPDATE pwreset SET verificated = ? WHERE email = ?");
    $updateTable->execute([1, $emailInput]);
    session_start();
    $_SESSION['user'] = $emailInput;

    header("Location: ../login/new-password");
    exit();
} else {
    echo "<script>alert('Verification code does not match with the one we provided. Please check again.');history.go(-1);</script>";
    die();
}