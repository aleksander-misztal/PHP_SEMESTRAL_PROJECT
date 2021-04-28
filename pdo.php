<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "wprdb";
try {
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    exit();
}
