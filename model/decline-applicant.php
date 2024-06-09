<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";
<<<<<<< HEAD
require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

$applicantId = $_GET['id'];
$userId = $_SESSION['id'];

<<<<<<< HEAD
$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$conn = $dbh->prepare("UPDATE appliedjobs SET declined = ? WHERE userId = ? AND companyId = ?");
if ($conn->execute([1, $applicantId, $userId])) {
    $log->add($userFullName['fullName'] . ' declined the applicant with ' . $applicantId . ' applicant id from the IP address ' . $ipAddress . '.');
=======
$conn = $dbh->prepare("UPDATE appliedjobs SET declined = ? WHERE userId = ? AND companyId = ?");
if ($conn->execute([1, $applicantId, $userId])) {
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
    echo "<script>alert('Successfully declined.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem declining. Please contact the admin');history.go(-1);</script>";
    die();
}