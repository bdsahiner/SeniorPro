<?php

try {
$dbh = new PDO('mysql:host=localhost; dbname=bluecollarinsight; charset=UTF8', "root", "");
} catch(PDOException $e) {
die($e->getMessage());
}
