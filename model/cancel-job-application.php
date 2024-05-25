<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";

$jobId = $_GET['id'];
$userId = $_SESSION['id'];

$conn = $dbh->prepare("DELETE FROM appliedjobs WHERE jobId = ? AND userId = ?");
if ($conn->execute([$jobId, $userId])) {
    echo "<script>alert('Successfully deleted.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem deleting. Please contact the admin');history.go(-1);</script>";
    die();
}