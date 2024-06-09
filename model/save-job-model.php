<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();
$ipAddress = $_SERVER['REMOTE_ADDR'];

$currentDate = date("Y-m-d H:i:s");

$userId = $_SESSION['id'];

$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$jobId = $_GET['id'];

$jobTitle = $dbh->prepare("SELECT jobTitle FROM jobs WHERE id = ?");
$jobTitle->execute([$jobId]);
$jobName = $jobTitle->fetch();

$bookmarked = $dbh->prepare("SELECT * FROM bookmarks WHERE jobId = ? AND employeeId = ?");
$bookmarked->execute([$jobId, $userId]);
$bookmarkedQuery = $bookmarked->fetchAll(PDO::FETCH_ASSOC);

if (!empty($bookmarkId)) {
    echo "<script>alert('This job post was already bookmarked.'); window.location.href = document.referrer || '/';</script>";
    // Fallback redirect using PHP if JavaScript is disabled
    header("Location: " . $_SERVER['HTTP_REFERER'] ?: '/');
    die();
}

$conn = $dbh->prepare("INSERT INTO bookmarks SET jobId = ?, employeeId = ?, bookmarkDate = ?");
if ($conn->execute([$jobId, $userId, $currentDate])) {
    $log->add($userFullName['fullName'] . ' saved the job posting named ' . $jobName['jobTitle'] . ' from the IP address ' . $ipAddress . '.');
    echo "<script>alert('You have succesfully saved the job post to your bookmarks.');history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('There was a problem saving this job post to bookmarks. Please contact the admin.');history.go(-1);</script>";
    die();
}
