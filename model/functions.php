<?php

<<<<<<< HEAD
=======
include_once "../config/connection.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

<<<<<<< HEAD
include_once "../config/connection.php";

require_once "../classes/log.class.php";
$log = new Log();


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$ipAddress = $_SERVER['REMOTE_ADDR'];

=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
$userId = $_SESSION['id'];

if (isset($_GET['id'])) {

    $jobId = $_GET['id'];
    $editJobPostData = $dbh->prepare("SELECT * FROM jobs WHERE id = ?");
    $editJobPostData->execute([$jobId]);
    $editJobPost = $editJobPostData->fetchAll(PDO::FETCH_ASSOC);
}

$verificationCode = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

// Bring user table for both employer and employee
$bringUsername = $dbh->prepare("SELECT * FROM users WHERE id = ?");
$bringUsername->execute([$userId]);
$userName = $bringUsername->fetchAll(PDO::FETCH_ASSOC);
<<<<<<< HEAD
$userFullName = $userName[0]['fullName'];
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11

// Handle the password change request for both employer and employee
if (isset($_POST['changePassword'])) {

    $oldPasswordInput = trim(sha1($_POST['currentPassword']));
    $newPasswordInput = trim(sha1($_POST['newPassword']));

    $pwCheck = $dbh->prepare("SELECT * FROM users WHERE id = ?");
    $pwCheck->execute([$userId]);
    $userData = $pwCheck->fetchAll(PDO::FETCH_ASSOC);

    foreach ($userData as $pw) {
        $oldPassword = trim($pw['password']);
    }

    if ($oldPasswordInput != $oldPassword) {
        echo "<script>alert('Current password is wrong. Please enter again.');history.go(-1);</script>";
        die();
    }

    if ($oldPassword == $newPasswordInput) {
        echo "<script>alert('You cannot use the same password. Please enter a new password.');history.go(-1);</script>";
        die();
    }

    $updateUsers = $dbh->prepare("UPDATE users SET `password` = ? WHERE `id` = ?");

    if ($updateUsers->execute([$newPasswordInput, $userId])) {
<<<<<<< HEAD
        $log->add($userFullName . ' changed their current password from the IP address ' . $ipAddress . '.');
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
        echo "<script>alert('You have successfully changed your password.');history.go(-1);</script>";
        exit;
    } else {
        echo "<script>alert('There was a problem changing your password. Please try again.');history.go(-1);</script>";
        die();
    }
}

// Start defining variables for employer functionality
if (isset($_SESSION['employer'])) {

    $currentDate = date("Y-m-d H:i:s");

    $bringSector = $dbh->prepare("SELECT * FROM sectors");
    $bringSector->execute();
    $sectors = $bringSector->fetchAll(PDO::FETCH_ASSOC);

    $bringDepartment = $dbh->prepare("SELECT * FROM department");
    $bringDepartment->execute();
    $departments = $bringDepartment->fetchAll(PDO::FETCH_ASSOC);

    $bringProvince = $dbh->prepare("SELECT * FROM provinces");
    $bringProvince->execute();
    $provinces = $bringProvince->fetchAll(PDO::FETCH_ASSOC);

    $bringJobPostData = $dbh->prepare("SELECT * FROM jobs WHERE companyId = ?");
    $bringJobPostData->execute([$userId]);
    $jobPostData = $bringJobPostData->fetchAll(PDO::FETCH_ASSOC);

    // Queries for dashboard index/cv
    $indexApplicants = $dbh->prepare("SELECT userId FROM appliedjobs WHERE companyId = ? AND declined = ?");
    $indexApplicants->execute([$userId, 0]);
    $indexApplicantsData = $indexApplicants->fetchAll(PDO::FETCH_ASSOC);

    $cvBuilderApplicants = array(); // Initialize an array to hold all applicants' data

    foreach ($indexApplicantsData as $in) {
        $applicantId = $in['userId'];
        $cvBuilderUsers = $dbh->prepare("SELECT * FROM cvbuilder WHERE userId = ?");
        $cvBuilderUsers->execute([$applicantId]);
        $applicantData = $cvBuilderUsers->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll
        if ($applicantData) {
            // Store the applicant data in the array indexed by userId
            $cvBuilderApplicants[$applicantId] = $applicantData;

            // Fetch job applications for each applicant
            $jobIdFromApplications = $dbh->prepare("SELECT jobId FROM appliedjobs WHERE userId = ? AND declined = ?");
            $jobIdFromApplications->execute([$applicantId, 0]);
            $jobIds = $jobIdFromApplications->fetchAll(PDO::FETCH_COLUMN);

            // Fetch job post information for all job IDs
            $jobPostInformation = array();
            foreach ($jobIds as $jbId) {
                $jobStuff = $dbh->prepare("SELECT * FROM jobs WHERE id = ?");
                $jobStuff->execute([$jbId]);
                $jobInformation = $jobStuff->fetch(PDO::FETCH_ASSOC);
                if ($jobInformation) {
                    // Store job information in the array
                    $jobPostInformation[] = $jobInformation;
                }
            }
            // Assign job post information to the applicant data
            $cvBuilderApplicants[$applicantId]['jobPostInformation'] = $jobPostInformation;
        }
    }

    $bringCompanyName = $dbh->prepare("SELECT * FROM companies WHERE employerId = ?");
    $bringCompanyName->execute([$userId]);
    $companyName = $bringCompanyName->fetchAll(PDO::FETCH_ASSOC);
    foreach ($companyName as $descp) {
        $compDescription = $descp['companyDescription'];
        $compName = $descp['companyName'];
        $compTax = $descp['taxNumber'];
        $compDate = $descp['establishDate'];
        $compHQ = $descp['headQuarters'];
        $compSector = $descp['sector'];
    }

<<<<<<< HEAD
    if ($compDate > $currentDate) {
        echo "<script>alert('Establishment date can not be later than today!.');history.go(-1);</script>";
        die();
    }

=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
    if (isset($_POST['submitChanges'])) {

        $headQuarters = $_POST['headQuarters'];
        $companyDescription = $_POST['companyDescription'];
        $sector = $_POST['sector'];
        $employeeCount = $_POST['employeeCount'];
        $dateOfEstablishment = $_POST['establishDate'];
        $website = $_POST['website'];

        // Update the companies table
        if (empty($compHQ)) {
            $updateQuery = "UPDATE companies SET companyDescription = ?, headQuarters = ?, sector = ?, employeeCount = ?, establishDate = ?, website = ? WHERE employerId = ?";
            $connection = $dbh->prepare($updateQuery);
            if ($connection->execute([$companyDescription, $headQuarters, $sector, $employeeCount, $dateOfEstablishment, $website, $userId])) {
<<<<<<< HEAD
                $log->add($userFullName . ' updated their company profile information from the IP address ' . $ipAddress . '.');
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
                echo "<script>alert('Successfully updated.');history.go(-1);</script>";
                exit;
            } else {
                echo "<script>alert('Problem updating. Please contact the admin.');history.go(-1);</script>";
                die();
            }
        } else {
            $updateQuery = "UPDATE companies SET companyDescription = ?, employeeCount = ?, website = ? WHERE employerId = ?";
            $connection = $dbh->prepare($updateQuery);
            if ($connection->execute([$companyDescription, $employeeCount, $website, $userId])) {
<<<<<<< HEAD
                $log->add($userFullName . ' updated their company profile information from the IP address ' . $ipAddress . '.');
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
                echo "<script>alert('Successfully updated.');history.go(-1);</script>";
                exit;
            } else {
                echo "<script>alert('Problem updating. Please contact the admin.');history.go(-1);</script>";
                die();
            }
        }

    }

    if (isset($_POST['jobDescript'])) {

        $jobDescript = $_POST['jobDescript'];
        $endingDate = $_POST['endDate'];

        $updateJob = $dbh->prepare("UPDATE jobs SET jobDescription = ?, endDate = ? WHERE id = ?");
        if ($updateJob->execute([$jobDescript, $endingDate, $jobId])) {
<<<<<<< HEAD
            $log->add($userFullName . ' updated the job posting with ID ' . $jobId . ' from the IP address ' . $ipAddress . '.');
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
            echo "<script>alert('Successfully updated.');history.go(-1);</script>";
            exit;
        } else {
            echo "<script>alert('There was a problem updating the job data. Please contact the admin.');history.go(-1);</script>";
            die();
        }
    }

}

if (isset($_SESSION['user']) || isset($_SESSION['employer'])) {

    if (isset($_POST['userChanges'])) {

        $fullName = trim($_POST['userProfileName']);
        $phoneNumber = trim($_POST['userProfilePhone']);
        $emailAddress = trim($_POST['userProfileEmail']);

        $appPassword = 'vblo xplu zkuw ipot';
        $sender = 'bluecollarinsight@gmail.com';
        $body = 'Your verification code: ' . $verificationCode;

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = $sender;                    //SMTP username
            $mail->Password = $appPassword;                             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($sender);
            $mail->addAddress($emailAddress);     //Add a recipient
            $mail->addReplyTo($sender, 'Information');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email Verification';
            $mail->Body = $body;

            $mail->send();
            echo 'Message has been sent';

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

<<<<<<< HEAD
        $log->add($userFullName . ' updated their profile information from the IP address ' . $ipAddress . '.');
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
        $updateUserProfile = $dbh->prepare("UPDATE users SET fullName = ?, phoneNumber = ?, email = ?, verificationCode = ?, verificated = ? WHERE id = ?");
        $updateUserProfile->execute([$fullName, $phoneNumber, $emailAddress, $verificationCode, 0, $userId]);

        echo "<script>alert('Please enter the verification code that has been sent to your email.');</script>";
        echo "<script>window.location='../login/email-verification?email=" . $emailAddress . "';</script>";

    }
}

if (isset($_SESSION['user'])) {

    $bringBookmarks = $dbh->prepare("SELECT * FROM bookmarks WHERE employeeId = ?");
    $bringBookmarks->execute([$userId]);
    $fetchBookmarks = $bringBookmarks->fetchAll(PDO::FETCH_ASSOC);

    $bringJobDataCount = $dbh->prepare("SELECT * FROM jobs");
    $bringJobDataCount->execute();
    $jobDataCount = $bringJobDataCount->fetchAll(PDO::FETCH_ASSOC);

    $latestJobs = $dbh->prepare("SELECT * FROM jobs ORDER BY id LIMIT 5");
    $latestJobs->execute();
    $latestJobPostings = $latestJobs->fetchAll(PDO::FETCH_ASSOC);

    $appliedJobData = $dbh->prepare("SELECT jobId FROM appliedjobs WHERE userId = ?");
    $appliedJobData->execute([$userId]);
    $appliedJobs = $appliedJobData->fetchAll(PDO::FETCH_ASSOC);

    $applicantDataDashboard = array();

    foreach ($appliedJobs as $apps) {
        $fetchJobData = $dbh->prepare("SELECT * FROM jobs WHERE id = ?");
        $fetchJobData->execute([$apps['jobId']]); // Change $apps['id'] to $apps['jobId']
        $fetchedJobData = $fetchJobData->fetch(PDO::FETCH_ASSOC);

        if ($fetchedJobData) {
            $applicantDataDashboard[$apps['jobId']] = $fetchedJobData; // Change $apps['id'] to $apps['jobId']
        }
    }


<<<<<<< HEAD
}

if (isset($_SESSION['admin'])) {

    // Bring unverified companies for admin
    $toVerifyCompanies = $dbh->prepare("SELECT * FROM companies WHERE verified = 0");
    $toVerifyCompanies->execute();
    $unverifiedCompanies = $toVerifyCompanies->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data for job postings
    $bringJobPostData = $dbh->prepare("SELECT * FROM jobs");
    $bringJobPostData->execute();
    $jobPostData = $bringJobPostData->fetchAll(PDO::FETCH_ASSOC);

    // Fetch data for companies-employers-employees pages
    $companiesPage = $dbh->prepare("SELECT * FROM companies WHERE verified = 1");
    $companiesPage->execute();
    $companyData = $companiesPage->fetchAll(PDO::FETCH_ASSOC);

    $employersPage = $dbh->prepare("SELECT * FROM users WHERE employer = 1");
    $employersPage->execute();
    $employerData = $employersPage->fetchAll(PDO::FETCH_ASSOC);

    $employeesPage = $dbh->prepare("SELECT * FROM users WHERE user = 1");
    $employeesPage->execute();
    $employeeData = $employeesPage->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST['submitDenial'])) {

        $companyId = $_GET['id'];

        $denialCompany = $dbh->prepare("SELECT employerId FROM companies WHERE id = ?");
        $denialCompany->execute([$companyId]);
        $deniedCompany = $denialCompany->fetch(PDO::FETCH_ASSOC);

        $denialEmployer = $dbh->prepare("SELECT * FROM users WHERE id = ?");
        $denialEmployer->execute([$deniedCompany['employerId']]);
        $deniedEmployer = $denialEmployer->fetch(PDO::FETCH_ASSOC);

        $subject = trim($_POST['subject']);
        $message = trim($_POST['message']);

        $appPassword = 'vblo xplu zkuw ipot';
        $sender = 'bluecollarinsight@gmail.com';
        $body = $message;

        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = $sender;                    //SMTP username
            $mail->Password = $appPassword;                             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($sender);
            $mail->addAddress($deniedEmployer['email']);     //Add a recipient
            $mail->addReplyTo($sender, 'Information');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $log->add($userFullName . ' sent an email to ' . $deniedEmployer['fullName'] . ' for informing the denial, from the IP address ' . $ipAddress . '.');

        echo "<script>alert('Employer was successfully informed about your message.');</script>";
        echo "<script>history.go(-1);</script>";

    }
=======
>>>>>>> d0e3feff85a61d296b72d15fcd80ba24f9d17e11
}