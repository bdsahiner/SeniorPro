<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";

$applicantId = $_GET['id'];
$userId = $_SESSION['id'];

$conn = $dbh->prepare("UPDATE appliedjobs SET declined = ? WHERE userId = ? AND companyId = ?");
if ($conn->execute([1, $applicantId, $userId])) {
    echo "<script>alert('Successfully declined.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem declining. Please contact the admin');history.go(-1);</script>";
    die();
}