<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userId = $_SESSION['id'];

include "../config/connection.php";

try {
    if (isset($_POST['generalDescription'])) {
        $stmt = $dbh->prepare("INSERT INTO cvbuilder (fullName, emailAddress, phoneNumber, province, generalDescription, totalExperience, expTitle, expCompany, expMonths, expDescription, eduSchoolTitle, eduDepartment, eduYears, eduDescription, additionalDescription, userId, submittedAt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        //Set the current date
        $currentDate = date("Y-m-d H:i:s");
        // Extract form data
        $fullName = $_POST['fullName'];
        $emailAddress = $_POST['emailAddress'];
        $phoneNumber = $_POST['phoneNumber'];
        $province = $_POST['province'];
        $generalDescription = $_POST['generalDescription'];
        $totalExperience = $_POST['totalExperience'];
        $eduSchoolTitle = $_POST['eduSchoolTitle'];
        $eduDepartment = $_POST['eduDepartment'];
        $eduYears = $_POST['eduYears'];
        $eduDescription = $_POST['eduDescription'];
        $additionalDescription = $_POST['additionalDescription'];

        // Initialize arrays to store aggregated values
        $expTitles = [];
        $expCompanies = [];
        $expMonths = []; // Initialize $expMonths as an empty array
        $expDescriptions = [];

        // Loop through each experience and store values in arrays
        for ($i = 0; $i < $totalExperience; $i++) {
            $expTitles[] = $_POST['expTitle' . $i];
            $expCompanies[] = $_POST['expCompany' . $i];
            $expMonths[] = $_POST['expMonths' . $i]; // Store each month value in the $expMonths array
            $expDescriptions[] = $_POST['expDescription' . $i];
        }

        // Combine arrays into comma-separated strings
        $expTitle = implode(', ', $expTitles);
        $expCompany = implode(', ', $expCompanies);
        $expMonth = implode(', ', $expMonths); // Now $expMonths is an array and can be imploded
        $expDescription = implode(', ', $expDescriptions);

        // Bind parameters
        $stmt->bindParam(1, $fullName);
        $stmt->bindParam(2, $emailAddress);
        $stmt->bindParam(3, $phoneNumber);
        $stmt->bindParam(4, $province);
        $stmt->bindParam(5, $generalDescription);
        $stmt->bindParam(6, $totalExperience);
        $stmt->bindParam(7, $expTitle);
        $stmt->bindParam(8, $expCompany);
        $stmt->bindParam(9, $expMonth);
        $stmt->bindParam(10, $expDescription);
        $stmt->bindParam(11, $eduSchoolTitle);
        $stmt->bindParam(12, $eduDepartment);
        $stmt->bindParam(13, $eduYears);
        $stmt->bindParam(14, $eduDescription);
        $stmt->bindParam(15, $additionalDescription);
        $stmt->bindParam(16, $userId);
        $stmt->bindParam(17, $currentDate);

        // Execute the SQL statement
        $stmt->execute();

        // Check for errors
        if ($stmt->errorCode() !== "00000") {
            $errors = $stmt->errorInfo();
            echo "Error: " . $errors[2];
        } else {
            // Show success message
            echo "<script>alert('Successfully submitted.');</script>";
        }

        // Redirect to the desired page
        echo "<script>window.location='cv-template';</script>";
    }
} catch (PDOException $e) {
    // Handle any database errors
    echo "Error: " . $e->getMessage();
}
