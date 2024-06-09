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

$conn = $dbh->prepare("DELETE FROM companies WHERE id = ?");
if ($conn->execute([$companyId])) {
    $log->add($userFullName['fullName'] . ' removed ' . $companyName['companyName'] . ' from the system, from the IP address ' . $ipAddress . '.');
    echo "<script>alert('Successfully deleted.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem deleting.');history.go(-1);</script>";
    die();
}