<?php
session_start();
require_once 'pdo.php';

$nick = $_SESSION['nick'];
$sql = "DELETE FROM users WHERE nick='$nick';";
if ($conn->query($sql) === TRUE) {
    echo "koonto usuniete ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
unset($_SESSION['nick']);
$conn->close();
if (!isset($_SESSION['nick'])) {
    session_destroy();
    header('location:index.php');
}
