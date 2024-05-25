<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['employer'])) {

    //Fetch the company ID (same with user ID)
    $companyId = $_SESSION['id'];

    include_once "../config/connection.php";

    $currentDate = date("Y-m-d H:i:s");

    if (isset($_POST['submitJob'])) {

        //Fetch the inputs
        $jobTitle = isset($_POST['jobTitle']) ? htmlspecialchars($_POST['jobTitle']) : '';
        $sector = isset($_POST['sector']) ? htmlspecialchars($_POST['sector']) : '';
        $department = isset($_POST['department']) ? htmlspecialchars($_POST['department']) : '';
        $jobDescription = isset($_POST['jobDescription']) ? htmlspecialchars($_POST['jobDescription']) : '';
        $province = isset($_POST['province']) ? htmlspecialchars($_POST['province']) : '';
        $experience = isset($_POST['experience']) ? htmlspecialchars($_POST['experience']) : '';
        $education = isset($_POST['education']) ? htmlspecialchars($_POST['education']) : '';
        $workType = isset($_POST['workType']) ? htmlspecialchars($_POST['workType']) : '';

        $bringCompName = $dbh->prepare("SELECT * FROM companies WHERE employerId = ?");
        $bringCompName->execute([$companyId]);
        $fetchName = $bringCompName->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fetchName as $comp) {
            $companyName = $comp['companyName'];
        }

        $endDate = isset($_POST['endDate']) ? htmlspecialchars($_POST['endDate']) : '';

        $endDateObject = new DateTime($endDateValue);

        // Add exactly 1 month to the endDate object
        $endDateObject->add(new DateInterval('P1M'));

        // Format the updated endDate as a string
        $endDatePlusOneMonth = $endDateObject->format('Y-m-d H:i:s');

        // Error Handling 1 -> application date can't be before the current date
        if ($endDate < $currentDate) {
            echo "<script>alert('You can not set the ending date before the current date. Please change the date and time.');history.go(-1);</script>";
            die();
        }

        // Error Handling 2 -> application date can't be longer than 1 month (optional)
        if ($endDate > $endDatePlusOneMonth) {
            echo "<script>alert('Job posts can not last longer than 1 month. Please change the date and time.');history.go(-1);</script>";
            die();
        }

        // Language preferences input
        $languages = isset($_POST['language']) ? $_POST['language'] : array();
        $languagePreference = is_array($languages) ? implode(',', $languages) : ''; // Convert array to comma-separated string

        $query = "INSERT INTO jobs SET jobTitle = ?, jobDescription = ?, companyId = ?, companyName = ?, province = ?, requestDate = ?, endDate = ?, sector = ?, experience = ?, department = ?, workType = ?, educationLevel = ?, languagePreference = ?, verified = ?";
        $insert = $dbh->prepare($query);

        if ($insert->execute([$jobTitle, $jobDescription, $companyId, $companyName, $province, $currentDate, $endDate, $sector, $experience, $department, $workType, $education, $languagePreference, 0])) {
            echo "<script>alert('You have successfully submitted your job application. System admins will review your application and get back to you as soon as possible.');</script>";
            echo "<script>window.location.href = '../dashboard/my-job-posts';</script>";
            exit;
        } else {
            echo "<script>alert('There was a problem during the insertion. Please contact the system admin.');history.go(-1);</script>";
            die();
        }

    }
}