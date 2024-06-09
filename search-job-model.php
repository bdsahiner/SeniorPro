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

// Retrieve search term from the URL
$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

// Constructing the SQL query dynamically based on the received filters
$query = "SELECT * FROM jobs WHERE 1=1";

// Loop through each filter option
foreach ($filterOptions as $option) {
    $key = $option['key'];
    if (!empty($filters[$key])) {
        if ($key === 'province' || $key === 'sector') {
            $query .= " AND $key = ?";
        } else {
            $query .= " AND $key IN (" . implode(', ', array_fill(0, count($filters[$key]), '?')) . ")";
        }
    } else {
        // Initialize an empty array if the filter key doesn't exist
        $filters[$key] = [];
    }
}

// Add search term to the query
if (!empty($searchTerm)) {
    $query .= " AND (jobTitle LIKE ? OR companyName LIKE ?)";
    // Add search term placeholders to the filters array
    $filters['searchTerm'] = ['%' . $searchTerm . '%', '%' . $searchTerm . '%'];
}

// Flatten the filters array for PDO
$flatFilters = array_merge(...array_values($filters));

// Assuming you have a database connection established, execute the query
$stmt = $dbh->prepare($query);
$stmt->execute($flatFilters);
$jobListings = $stmt->fetchAll(PDO::FETCH_ASSOC);