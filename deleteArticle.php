<?php
session_start();
if (!isset($_SESSION['nick'])) {
    header("location:index.php");
} else {
    if (isset($_GET['id'])) {
        $id_article = $_GET['id'];
    } else {
        header("location:index.php");
    }
}
require_once 'conn.php';


$sql = "DELETE FROM article WHERE id_article='$id_article'";
if ($conn->query($sql) === TRUE) {

    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
