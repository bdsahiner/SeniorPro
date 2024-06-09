<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user'])) {

    include_once "../config/connection.php";

    require_once "../classes/log.class.php";
    $log = new Log();
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    $userId = $_SESSION["id"];

    $name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
    $name->execute([$userId]);
    $userFullName = $name->fetch();

    $provinces = $dbh->prepare("SELECT province FROM provinces");
    $provinces->execute();
    $province = $provinces->fetchAll(PDO::FETCH_ASSOC);

    $cvBuilderData = $dbh->prepare("SELECT * FROM cvbuilder WHERE userId = ?");
    $cvBuilderData->execute([$userId]);
    $cvData = $cvBuilderData->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cvData as $cv) {
        $generalDescription = $cv['generalDescription'];
        $fullName = $cv['fullName'];
        $emailAddress = $cv['emailAddress'];
        $phoneNumber = $cv['phoneNumber'];
        $provinceQ = $cv['province'];
        $eduTitle = $cv['eduSchoolTitle'];
        $eduDepartment = $cv['eduDepartment'];
        $eduYears = $cv['eduYears'];
        $eduDescription = $cv['eduDescription'];
        $totalExperience = $cv['totalExperience'];
        $expTitle = $cv['expTitle'];
        $expCompany = $cv['expCompany'];
        $expMonths = $cv['expMonths'];
        $expDescription = $cv['expDescription'];
        $additionalDescription = $cv['additionalDescription'];
    }
}

if (isset($_POST['submitCV'])) {

    $name = $_POST['fullName'];
    $email = $_POST['emailAddress'];
    $phone = $_POST['phoneNumber'];
    $provinceA = $_POST['province'];
    $gDesc = $_POST['generalDescription'];
    $totalExp = $_POST['totalExperience'];
    $eduTitle = $_POST['eduSchoolTitle'];
    $eduDep = $_POST['eduDepartment'];
    $eduYear = $_POST['eduYears'];
    $eduDesc = $_POST['eduDescription'];
    $additionalDesc = $_POST['additionalDescription'];

    $updateCV = $dbh->prepare('UPDATE cvbuilder SET fullName = ?, emailAddress = ?, phoneNumber = ?, province = ?, generalDescription = ?, eduSchoolTitle = ?, eduDepartment = ?, eduYears = ?, eduDescription = ?, additionalDescription = ? WHERE userId = ?');
    if($updateCV->execute([$name, $email, $phone, $provinceA, $gDesc, $eduTitle, $eduDep, $eduYear, $eduDesc, $additionalDesc, $userId])) {
        $log->add($userFullName['fullName'] . ' edited their own CV from the IP address ' . $ipAddress . '.');
        echo "<script>alert('Successfully updated.');history.go(-1);</script>";
    }
}
