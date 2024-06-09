<?php

<<<<<<< HEAD
include_once "../config/connection.php";
require_once "../classes/log.class.php";
$log = new Log();

=======
define("secure", true);

include_once "../config/connection.php";
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

if (isset($_POST['userEmail']) && isset($_POST['userPw'])) {

    $email = trim($_POST['userEmail']);
    $password = trim($_POST['userPw']);
    $sha1Password = sha1($password); // Hash the password using SHA1

    // Retrieve the user from the database based on the provided email
    $conn = $dbh->prepare("SELECT * FROM users WHERE `email` = ?");
    $conn->execute([$email]);
    $user = $conn->fetch(PDO::FETCH_ASSOC);
<<<<<<< HEAD
    $userFullName = $user['fullName'];
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

    if ($user) {
        // Check if the password matches the hashed password stored in the database
        if ($user['password'] === $sha1Password) {
            // Check if the user is active
            if ($user['active'] == 1) {
                session_start();
<<<<<<< HEAD
                $ipAddress = $_SERVER['REMOTE_ADDR'];
                $_SESSION['id'] = $user['id'];
                // Determine the role of the user
                if ($user['user'] == 1) {
                    $log->add($userFullName . ' successfully logged into the system from the IP address ' . $ipAddress . '.');
                    $_SESSION['user'] = $email;
                    header("Location: ../dashboard");
                } elseif ($user['employer'] == 1) {
                    $log->add($userFullName . ' successfully logged into the system from the IP address ' . $ipAddress . '.');
                    $_SESSION['employer'] = $email;
                    header("Location: ../dashboard");
                } elseif ($user['admin'] == 1) {
                    $log->add($userFullName . ' successfully logged into the system from the IP address ' . $ipAddress . '.');
=======
                $_SESSION['id'] = $user['id'];
                // Determine the role of the user
                if ($user['user'] == 1) {
                    $_SESSION['user'] = $email;
                    header("Location: ../dashboard");
                } elseif ($user['employer'] == 1) {
                    $_SESSION['employer'] = $email;
                    header("Location: ../dashboard");
                } elseif ($user['admin'] == 1) {
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
                    $_SESSION['admin'] = $email;
                    header("Location: ../dashboard");
                } else {
                    echo "<script>alert('Invalid user role.');history.go(-1);</script>";
                }
                exit();
            } else {
                echo "<script>alert('Your account is not active at the moment.');history.go(-1);</script>";
                die();
            }
        } else {
            echo "<script>alert('Invalid email or password.');history.go(-1);</script>";
            die();
        }
    } else {
        echo "<script>alert('User not found.');history.go(-1);</script>";
        die();
    }
}
