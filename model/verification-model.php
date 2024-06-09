<?php

include_once "../config/connection.php";

<<<<<<< HEAD
require_once "../classes/log.class.php";
$log = new Log();
$ipAdress = $_SERVER['REMOTE_ADDR'];

=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
$emailInput = $_POST['email'];
$verificationInput = $_POST['verificationCode'];

$conn = $dbh->prepare("SELECT verificationCode FROM users WHERE email = ?");
$conn->execute([$emailInput]);
$code = $conn->fetch(PDO::FETCH_ASSOC);
$verificationCode = $code['verificationCode'];

<<<<<<< HEAD
=======
$employeeCheck = $dbh->prepare("SELECT user FROM users WHERE email = ?");
$employeeCheck->execute([$emailInput]);
$checker = $employeeCheck->fetch(PDO::FETCH_ASSOC);
$employeeEmail = $checker['user'];

$employerCheck = $dbh->prepare("SELECT employer FROM users WHERE email = ?");
$employerCheck->execute([$emailInput]);
$checker1 = $employerCheck->fetch(PDO::FETCH_ASSOC);
$employerEmail = $checker1['employer'];

>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
if ($verificationCode === $verificationInput) {

    $updateUser = $dbh->prepare("UPDATE users SET verificated = ?, active = ? WHERE email = ?");
    $updateUser->execute([1, 1, $emailInput]);

    header("Location: ../login/redirect");
    exit();
} else {
    echo "<script>alert('Verification code does not match with the one we provided. Please check again.');history.go(-1);</script>";
<<<<<<< HEAD
    die();
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
}
