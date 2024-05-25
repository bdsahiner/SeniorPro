<?php

define("secure", true);

include_once "../config/connection.php";

if (isset($_POST['userEmail']) && isset($_POST['userPw'])) {

    $email = trim($_POST['userEmail']);
    $password = trim($_POST['userPw']);
    $sha1Password = sha1($password); // Hash the password using SHA1

    // Retrieve the user from the database based on the provided email
    $conn = $dbh->prepare("SELECT * FROM users WHERE `email` = ?");
    $conn->execute([$email]);
    $user = $conn->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Check if the password matches the hashed password stored in the database
        if ($user['password'] === $sha1Password) {
            // Check if the user is active
            if ($user['active'] == 1) {
                session_start();
                $_SESSION['id'] = $user['id'];
                // Determine the role of the user
                if ($user['user'] == 1) {
                    $_SESSION['user'] = $email;
                    header("Location: ../dashboard");
                } elseif ($user['employer'] == 1) {
                    $_SESSION['employer'] = $email;
                    header("Location: ../dashboard");
                } elseif ($user['admin'] == 1) {
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
