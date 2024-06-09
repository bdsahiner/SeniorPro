<?php

require __DIR__ . '/../vendor/autoload.php'; // Path to autoload.php of phpwkhtmltopdf library

use mikehaertl\wkhtmlto\Pdf;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$userId = $_SESSION['id'];

include "../config/connection.php";

$name = $dbh->prepare("SELECT fullName FROM users WHERE id = ?");
$name->execute([$userId]);
$userFullName = $name->fetch();

$stmt = $dbh->prepare("SELECT * FROM cvbuilder WHERE userId = ?");
$stmt->execute([$userId]);
$cvData = $stmt->fetch(PDO::FETCH_ASSOC);

$stt = $dbh->prepare("SELECT expTitle, expCompany, expMonths, expDescription FROM cvbuilder WHERE userId = ?");
$stt->execute([$userId]);
$expData = $stt->fetchAll(PDO::FETCH_ASSOC);

// Path to store temporary files
$tempDir = __DIR__ . '/../temp/';

// Create HTML content for the CV
$html = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>CV</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      html {
        height: 100%;  
      }
      
      body {
        min-height: 100%;  
        background: #eee;
        font-family: 'Lato', sans-serif;
        font-weight: 400;
        color: #222;
        font-size: 14px;
        line-height: 26px;
        padding-bottom: 50px;
      }
      
      .container {
        max-width: 700px;   
        background: #fff;
        margin: 0px auto 0px; 
        box-shadow: 1px 1px 2px #DAD7D7;
        border-radius: 3px;  
        padding: 40px;
        margin-top: 50px;
      }
      
      .header {
        margin-bottom: 30px;
        
        .full-name {
          font-size: 40px;
          text-transform: uppercase;
          margin-bottom: 5px;
        }
        
        .first-name {
          font-weight: 700;
        }
        
        .last-name {
          font-weight: 300;
        }
        
        .contact-info {
          margin-bottom: 20px;
        }
        
        .email ,
        .phone {
          color: #999;
          font-weight: 300;
        } 
        
        .separator {
          height: 10px;
          display: inline-block;
          border-left: 2px solid #999;
          margin: 0px 10px;
        }
        
        .position {
          font-weight: bold;
          display: inline-block;
          margin-right: 10px;
          text-decoration: underline;
        }
      }
      
      
      .details {
        line-height: 20px;
        
        .section {
          margin-bottom: 40px;  
        }
        
        .section:last-of-type {
          margin-bottom: 0px;  
        }
        
        .section__title {
          letter-spacing: 2px;
          color: #54AFE4;
          font-weight: bold;
          margin-bottom: 10px;
          text-transform: uppercase;
        }
        
        .section__list-item {
          margin-bottom: 40px;
        }
        
        .section__list-item:last-of-type {
          margin-bottom: 0;
        }
        
        .left ,
        .right {
          vertical-align: top;
          display: inline-block;
        }
        
        .left {
          width: 60%;    
        }
        
        .right {
          tex-align: right;
          width: 39%;    
        }
        
        .name {
          font-weight: bold;
        }
        
        a {
          text-decoration: none;
          color: #000;
          font-style: italic;
        }
        
        a:hover {
          text-decoration: underline;
          color: #000;
        }
        
        .skills {
          
        }
          
        .skills__item {
          margin-bottom: 10px;  
        }
        
        .skills__item .right {
          input {
            display: none;
          }
          
          label {
            display: inline-block;  
            width: 20px;
            height: 20px;
            background: #C3DEF3;
            border-radius: 20px;
            margin-right: 3px;
          }
          
          input:checked + label {
            background: #79A9CE;
          }
        }
      }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <div class='full-name'>
                <span class='first-name'>{$cvData['fullName']}</span>
            </div>
            <div class='contact-info'>
                <span class='email'>Email: </span>
                <span class='email-val'>{$cvData['emailAddress']}</span>
                <span class='separator'></span>
                <span class='phone'>Phone: </span>
                <span class='phone-val'>{$cvData['phoneNumber']}</span>
            </div>
            <div class='about'>
                <span class='desc'>{$cvData['generalDescription']}</span>
            </div>
        </div>
        <div class='details'>
            <div class='section'>
                <div class='section__title'>Experience</div>
                <div class='section__list'>";
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
            $html .= "
                            <div class='section__list-item'>
                                <div class='left'>
                                    <div class='name'>{$companies[$i]}</div>
                                    <div class='duration'>" . (!empty($months) ? $months[$i] . ' Months' : '') . "</div>
                                </div>
                                <div class='right'>
                                    <div class='name'>{$titles[$i]}</div>
                                    <div class='desc'>" . nl2br($descriptions[$i]) . "</div>
                                </div>
                            </div>";
        }
    }
} else {
    // Handle case when no records are found
    $html .= "No records found.";
}

$html .= "
                </div>
            </div>
            <div class='section'>
                <div class='section__title'>Education</div>
                <div class='section__list'>
                    <div class='section__list-item'>
                        <div class='left'>
                            <div class='name'>{$cvData['eduSchoolTitle']}</div>
                            <div class='duration'>{$cvData['eduYears']} Years</div>
                        </div>
                        <div class='right'>
                            <div class='name'>{$cvData['eduDepartment']}</div>
                            <div class='desc'>{$cvData['eduDescription']}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='section'>
                <div class='section__title'>Additional Notes</div>
                <div class='section__list'>
                    <div class='section__list-item'>
                        <div class='text'>{$cvData['additionalDescription']}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
";

// Generate PDF
$pdf = new Pdf([
    'binary' => 'C:\wkhtmltopdf\bin\wkhtmltopdf.exe', // Path to wkhtmltopdf binary on Windows
    'tmpDir' => $tempDir, // Temporary directory for storing intermediate files
]);

$pdf->addPage($html);

$pdfFile = $tempDir . $cvData['fullName'] . '.pdf'; // Path to store the generated PDF file

if (!$pdf->saveAs($pdfFile)) {
    echo $pdf->getError();
    exit;
}

echo "<script>alert('Successfully downloaded.');</script>";
echo "<script>window.location='cv-template';</script>";