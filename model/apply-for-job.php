<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";

$currentDate = date("Y-m-d H:i:s");

$userId = $_SESSION['id'];

$jobId = $_GET['id'];

$bringCompany = $dbh->prepare("SELECT companyId FROM jobs WHERE id = ?");
$bringCompany->execute([$jobId]);
$compID = $bringCompany->fetchAll(PDO::FETCH_ASSOC);

foreach ($compID as $cID) {
    $companyID = $cID['companyId'];
}

$conn = $dbh->prepare("INSERT INTO appliedjobs SET jobId = ?, userId = ?, companyId = ?, applicationDate = ? declined = ?");
if ($conn->execute([$jobId, $userId, $companyID, $currentDate, 0])) {
    echo "<script>alert('You have succesfully applied for the job.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem applying to this job. Please contact the admin.');history.go(-1);</script>";
    die();
}
