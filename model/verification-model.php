<?php

include_once "../config/connection.php";

$emailInput = $_POST['email'];
$verificationInput = $_POST['verificationCode'];

$conn = $dbh->prepare("SELECT verificationCode FROM users WHERE email = ?");
$conn->execute([$emailInput]);
$code = $conn->fetch(PDO::FETCH_ASSOC);
$verificationCode = $code['verificationCode'];

$employeeCheck = $dbh->prepare("SELECT user FROM users WHERE email = ?");
$employeeCheck->execute([$emailInput]);
$checker = $employeeCheck->fetch(PDO::FETCH_ASSOC);
$employeeEmail = $checker['user'];

$employerCheck = $dbh->prepare("SELECT employer FROM users WHERE email = ?");
$employerCheck->execute([$emailInput]);
$checker1 = $employerCheck->fetch(PDO::FETCH_ASSOC);
$employerEmail = $checker1['employer'];

if ($verificationCode === $verificationInput) {

    $updateUser = $dbh->prepare("UPDATE users SET verificated = ?, active = ? WHERE email = ?");
    $updateUser->execute([1, 1, $emailInput]);

    header("Location: ../login/redirect");
    exit();
} else {
    echo "<script>alert('Verification code does not match with the one we provided. Please check again.');history.go(-1);</script>";
}
