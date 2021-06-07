<?php
session_start();
require_once 'conn.php';
if (!isset($_SESSION['nick'])) {
    session_destroy();
    header('location:login.php');
}
$nick = $_SESSION['nick'];
$sql = "DELETE FROM users WHERE nick='$nick';";
if ($conn->query($sql) === TRUE) {
    session_destroy();
    header('location:index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
