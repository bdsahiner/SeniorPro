<?php

include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();
$ipAdress = $_SERVER['REMOTE_ADDR'];

$emailInput = $_POST['email'];
$verificationInput = $_POST['verificationCode'];

$conn = $dbh->prepare("SELECT verificationCode FROM users WHERE email = ?");
$conn->execute([$emailInput]);
$code = $conn->fetch(PDO::FETCH_ASSOC);
$verificationCode = $code['verificationCode'];

if ($verificationCode === $verificationInput) {

    $updateUser = $dbh->prepare("UPDATE users SET verificated = ?, active = ? WHERE email = ?");
    $updateUser->execute([1, 1, $emailInput]);

    header("Location: ../login/redirect");
    exit();
} else {
    echo "<script>alert('Verification code does not match with the one we provided. Please check again.');history.go(-1);</script>";
    die();
}
