<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once "config/connection.php";

$userId = $_SESSION["user"];

$cvBuilderData = $dbh->prepare("SELECT * FROM cvbuilder WHERE userId = ?");
$cvBuilderData->execute([$userId]);
$cvData = $cvBuilderData->fetchAll(PDO::FETCH_ASSOC);

foreach ($cvData as $cv) {
    $generalDescription = $cv['$generalDescription'];
    $fullName = $cv['fullName'];
    $emailAddress = $cv['emailAddress'];
}

echo $fullName;