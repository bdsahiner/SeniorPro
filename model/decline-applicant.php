<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";
require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];

$applicantId = $_GET['id'];
$userId = $_SESSION['id'];

$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$conn = $dbh->prepare("UPDATE appliedjobs SET declined = ? WHERE userId = ? AND companyId = ?");
if ($conn->execute([1, $applicantId, $userId])) {
    $log->add($userFullName['fullName'] . ' declined the applicant with ' . $applicantId . ' applicant id from the IP address ' . $ipAddress . '.');
    echo "<script>alert('Successfully declined.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem declining. Please contact the admin');history.go(-1);</script>";
    die();
}