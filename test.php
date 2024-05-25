<?php
include_once "config/connection.php";

$appliedJobData = $dbh->prepare("SELECT id FROM appliedjobs WHERE userId = ?");
$appliedJobData->execute([1]);
$appliedJobs = $appliedJobData->fetchAll();

print_r ($appliedJobs);