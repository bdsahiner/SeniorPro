<?php

include_once "../config/connection.php";
<<<<<<< HEAD
require_once "../classes/log.class.php";
$log = new Log();
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

// Start the session
session_start();

<<<<<<< HEAD
// Define who will logout from the system
$userId = $_SESSION['id'];
$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$ipAddress = $_SERVER['REMOTE_ADDR'];

=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

<<<<<<< HEAD
// Insert into logs
$log->add($userFullName['fullName'] . ' logged out of the system from the IP address ' . $ipAddress . '.');

=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
// Redirect the user
header("location: ../index.php");
exit; // Ensure script execution stops after redirection