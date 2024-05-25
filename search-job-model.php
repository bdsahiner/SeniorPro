<?php

include_once "config/connection.php";

// Fetching sectors
$bringSector = $dbh->prepare("SELECT sector FROM sectors");
$bringSector->execute();
$sectors = $bringSector->fetchAll(PDO::FETCH_ASSOC);

// Fetching experiences
$bringExperience = $dbh->prepare("SELECT experience FROM experiences");
$bringExperience->execute();
$experiences = $bringExperience->fetchAll(PDO::FETCH_ASSOC);

// Fetching work types
$bringWorkType = $dbh->prepare("SELECT workType FROM experiences");
$bringWorkType->execute();
$workTypes = $bringWorkType->fetchAll(PDO::FETCH_ASSOC);

// Fetching education levels
$bringEduLevel = $dbh->prepare("SELECT educationLevel FROM experiences");
$bringEduLevel->execute();
$eduLevels = $bringEduLevel->fetchAll(PDO::FETCH_ASSOC);

// Fetching provinces
$bringProvince = $dbh->prepare("SELECT * FROM provinces");
$bringProvince->execute();
$provinces = $bringProvince->fetchAll(PDO::FETCH_ASSOC);

$currentDate = date("Y-m-d H:i:s");

// Define filter options
$filterOptions = array(
    array(
        'label' => 'Sector',
        'key' => 'sector',
        'data' => $sectors
    ),
    array(
        'label' => 'Experience',
        'key' => 'experience',
        'data' => $experiences
    ),
    array(
        'label' => 'Work Type',
        'key' => 'workType',
        'data' => $workTypes
    ),
    array(
        'label' => 'Education',
        'key' => 'educationLevel',
        'data' => $eduLevels
    ),
    array(
        'label' => 'Province',
        'key' => 'province',
        'data' => $provinces
    )
);

// Initialize an empty array for filters
$filters = [];

// Retrieve filter parameters from the URL
if(isset($_GET['filters'])) {
    $filters = $_GET['filters'];
}

// Constructing the SQL query dynamically based on the received filters
$query = "SELECT * FROM jobs WHERE 1=1";

// Loop through each filter option
foreach ($filterOptions as $option) {
    $key = $option['key'];
    if (!empty($filters[$key])) {
        $query .= " AND $key IN (" . implode(', ', array_fill(0, count($filters[$key]), '?')) . ")";
    } else {
        // Initialize an empty array if the filter key doesn't exist
        $filters[$key] = [];
    }
}

// Assuming you have a database connection established, execute the query
$stmt = $dbh->prepare($query);
$stmt->execute(array_merge(...array_values($filters)));
$jobListings = $stmt->fetchAll(PDO::FETCH_ASSOC);