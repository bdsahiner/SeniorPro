<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];

$companyId = $_GET['id'];
$userId = $_SESSION['id'];

$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$companyTitle = $dbh->prepare("SELECT companyName FROM companies WHERE id = ?");
$companyTitle->execute([$companyId]);
$companyName = $companyTitle->fetch();

$conn = $dbh->prepare("UPDATE companies SET verified = ? WHERE id = ?");
if ($conn->execute([0, $companyId])) {
    $log->add($userFullName['fullName'] . ' disabled ' . $companyName['companyName'] . ' in the system, from the IP address ' . $ipAddress . '.');
    echo "<script>alert('Successfully disabled.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem deleting.');history.go(-1);</script>";
    die();
}