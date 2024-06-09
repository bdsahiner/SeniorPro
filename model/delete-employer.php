<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];

$userIdFromURL = $_GET['id'];
$userId = $_SESSION['id'];

$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$URLuser = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$URLuser->execute([$userIdFromURL]);
$URLuserName = $URLuser->fetch();

$conn = $dbh->prepare("DELETE FROM users WHERE id = ?");
if ($conn->execute([$userIdFromURL])) {

    $deleteJobs = $dbh->prepare("DELETE FROM jobs WHERE companyId = ?");
    $deleteJobs->execute([$userIdFromURL]);

    $deleteCompany = $dbh->prepare("DELETE FROM companies WHERE employerId = ?");
    $deleteCompany->execute([$userIdFromURL]);

    $log->add($userFullName['fullName'] . ' deleted the user ' . $URLuserName['fullName'] . ' and its job posts from the system, from the IP address ' . $ipAddress . '.');
    echo "<script>alert('Successfully deleted.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem deleting.');history.go(-1);</script>";
    die();
}