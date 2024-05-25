<?php

include_once "../config/connection.php";

// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user
header("location: ../index.php");
exit; // Ensure script execution stops after redirection