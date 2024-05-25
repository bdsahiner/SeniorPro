<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['employer'])) {

include_once "../config/connection.php";
include_once "../model/functions.php";

$userId = $_SESSION['id'];
$cvID = $_GET['id'];

$bringCVData = $dbh->prepare("SELECT * FROM cvbuilder WHERE id = ?");
$bringCVData->execute([$cvID]);
$CVDatas = $bringCVData->fetchAll(PDO::FETCH_ASSOC);

$experienceData = $dbh->prepare("SELECT expTitle, expCompany, expMonths, expDescription FROM cvbuilder WHERE id = ?");
$experienceData->execute([$cvID]);
$expData = $experienceData->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../css/cv.css">
  <title>Blue Collar Insight | CV Template</title>
</head>

<body>
  <?php foreach ($CVDatas as $cvData) { ?>
    <div class="container">
      <div class="header">
        <div class="full-name">
          <span class="first-name"><?php echo $cvData['fullName'] ?></span>
        </div>
        <div class="contact-info">
          <span class="email">Email: </span>
          <span class="email-val"><?php echo $cvData['emailAddress'] ?></span>
          <span class="separator"></span>
          <span class="phone">Phone: </span>
          <span class="phone-val"><?php echo $cvData['phoneNumber'] ?></span>
        </div>

        <div class="about">
          <span class="desc">
            <?php echo $cvData['generalDescription'] ?>
          </span>
        </div>
      </div>
      <div class="details">
        <div class="section">
          <div class="section__title">Experience</div>
          <div class="section__list">
            <?php
            // Iterate through the arrays simultaneously
            if ($expData) {
              // Iterate through each record to generate HTML output
              foreach ($expData as $exp) {
                // Split the values by commas
                $titles = explode(', ', $exp['expTitle']);
                $companies = explode(', ', $exp['expCompany']);
                $months = explode(', ', $exp['expMonths']);
                $descriptions = explode(', ', $exp['expDescription']);

                // Output HTML for each set of values
                for ($i = 0; $i < count($titles); $i++) {
                  ?>
                  <div class="section__list-item">
                    <div class="left">
                      <div class="name"><?php echo $companies[$i]; ?></div>
                      <div class="duration"><?php echo !empty($months) ? $months[$i] . ' Months' : ''; ?></div>
                    </div>
                    <div class="right">
                      <div class="name"><?php echo $titles[$i]; ?></div>
                      <div class="desc"><?php echo $descriptions[$i]; ?></div>
                    </div>
                  </div>
                  <?php
                }
              }
            } else {
              // Handle case when no records are found
              echo "No records found.";
            }
            ?>

          </div>
        </div>
        <div class="section">
          <div class="section__title">Education</div>
          <div class="section__list">
            <div class="section__list-item">
              <div class="left">
                <div class="name"><?php echo $cvData['eduSchoolTitle'] ?></div>
                <div class="duration"><?php echo $cvData['eduYears'] ?> Years</div>
              </div>
              <div class="right">
                <div class="name"><?php echo $cvData['eduDepartment'] ?></div>
                <div class="desc"><?php echo $cvData['eduDescription'] ?></div>
              </div>
            </div>
          </div>

        </div>
        <div class="section">
          <div class="section__title">Additional Notes</div>
          <div class="section__list">
            <div class="section__list-item">
              <div class="text"><?php echo $cvData['additionalDescription'] ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="button-container" style="text-align: center; margin-top: 20px;">
      <a href="#" class="button" style="background-color: #004dda;">Download CV <i class="fa fa-arrow-circle-right"></i></a>
      <a href="../dashboard" class="button" style="background-color: #004dda;">Back to Dashboard <i class="fa fa-arrow-circle-right"></i></a>
    </div>

    
  <?php } ?>
</body>

</html>
<?php } else {
    echo '<script>alert("Please login first!");history.go(-1);</script>';
    header("Location: ../index");
    exit();
} ?>