<?php

include_once "config/connection.php";

$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

// Constructing the SQL query
$query = "SELECT jobTitle FROM jobs WHERE jobTitle LIKE ? OR companyName LIKE ? LIMIT 10";
$params = ['%' . $searchTerm . '%', '%' . $searchTerm . '%'];

$stmt = $dbh->prepare($query);
$stmt->execute($params);
$jobTitles = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($jobTitles as $job) {
    echo '<div class="suggestion-item">' . htmlspecialchars($job['jobTitle']) . '</div>';
}
