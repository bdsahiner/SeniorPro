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
if (isset($_SESSION['user'])) {

    $conn = $dbh->prepare("SELECT * FROM users WHERE email = ?");
    $conn->execute([$_SESSION['user']]);
    $fetch = $conn->fetch(PDO::FETCH_ASSOC);
    $userPassword = trim($fetch['password']);
<<<<<<< HEAD
    $userFullName = $fetch['fullName'];
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

    if (isset($_POST['userPw'])) {

        $passwordInput = $_POST['userPw'];

        $newPassword = trim(sha1($passwordInput));

        if ($userPassword == $newPassword) {
            echo "<script>alert('You cannot use the same password. Please enter a new password.');history.go(-1);</script>";
            die();
        }

<<<<<<< HEAD
        $log->add($userFullName . ' changed their current password from the IP address ' . $ipAddress . '.');
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
        $updateUsers = $dbh->prepare("UPDATE users SET `password` = ? WHERE `email` = ?");
        $updateUsers->execute([$newPassword, $_SESSION['user']]);

        header("Location: ../login/redirect");
        exit();
    }

} else {
    header("Location: ../index");
    exit();
}
?>