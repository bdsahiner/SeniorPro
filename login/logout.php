<?php

include_once "../config/connection.php";
require_once "../classes/log.class.php";
$log = new Log();

// Start the session
session_start();

// Define who will logout from the system
$userId = $_SESSION['id'];
$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$ipAddress = $_SERVER['REMOTE_ADDR'];

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Insert into logs
$log->add($userFullName['fullName'] . ' logged out of the system from the IP address ' . $ipAddress . '.');

// Redirect the user
header("location: ../index.php");
exit; // Ensure script execution stops after redirection