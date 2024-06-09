<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];

$jobId = $_GET['id'];
$userId = $_SESSION['id'];

$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$jobTitle = $dbh->prepare("SELECT jobTitle FROM jobs WHERE id = ?");
$jobTitle->execute([$jobId]);
$jobName = $jobTitle->fetch();

$conn = $dbh->prepare("DELETE FROM appliedjobs WHERE jobId = ? AND userId = ?");
if ($conn->execute([$jobId, $userId])) {
    $log->add($userFullName['fullName'] . ' removed ' . $jobName['jobTitle'] . ' from applications from the IP address ' . $ipAddress . '.');
    echo "<script>alert('Successfully deleted.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem deleting. Please contact the admin');history.go(-1);</script>";
    die();
}