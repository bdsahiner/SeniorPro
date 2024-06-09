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

$currentDate = date("Y-m-d H:i:s");

$userId = $_SESSION['id'];

<<<<<<< HEAD
$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$jobId = $_GET['id'];

$jobTitle = $dbh->prepare("SELECT jobTitle FROM jobs WHERE id = ?");
$jobTitle->execute([$jobId]);
$jobName = $jobTitle->fetch();

=======
$jobId = $_GET['id'];

>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
$bringCompany = $dbh->prepare("SELECT companyId FROM jobs WHERE id = ?");
$bringCompany->execute([$jobId]);
$compID = $bringCompany->fetchAll(PDO::FETCH_ASSOC);

foreach ($compID as $cID) {
    $companyID = $cID['companyId'];
}

<<<<<<< HEAD
$conn = $dbh->prepare("INSERT INTO appliedjobs SET jobId = ?, userId = ?, companyId = ?, applicationDate = ?, declined = ?");
if ($conn->execute([$jobId, $userId, $companyID, $currentDate, 0])) {
    $log->add($userFullName['fullName'] . ' applied to the job posting named ' . $jobName['jobTitle'] . ' from the IP address ' . $ipAddress . '.');
=======
$conn = $dbh->prepare("INSERT INTO appliedjobs SET jobId = ?, userId = ?, companyId = ?, applicationDate = ? declined = ?");
if ($conn->execute([$jobId, $userId, $companyID, $currentDate, 0])) {
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
    echo "<script>alert('You have succesfully applied for the job.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem applying to this job. Please contact the admin.');history.go(-1);</script>";
    die();
}
