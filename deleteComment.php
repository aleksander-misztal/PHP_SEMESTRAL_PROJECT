<?php
session_start();
if (!isset($_SESSION['nick'])) {
    header("location:index.php");
} else {
    if (isset($_GET['id_comm']) and isset($_GET['id_article'])) {
        $id_comm = $_GET['id_comm'];
        $id_article = $_GET['id_article'];
    } else {
        header("location:index.php");
    }
}
require_once 'conn.php';

$sql = "DELETE FROM comments WHERE id_comm='$id_comm'";
if ($conn->query($sql) === TRUE) {
    echo "Komentarz usuniety ";
    header("location:display_article.php?id=$id_article");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
