<?php

function checkIfNickExists($conn, $nick)
{
    $checkIfNickExistsQuery = "SELECT * FROM users WHERE nick='$nick'";
    $checkIfNickExists = $conn->query($checkIfNickExistsQuery);
    if ($checkIfNickExists->num_rows > 0) {
        while ($row = $checkIfNickExists->fetch_assoc()) {
            if ($nick == $row["nick"]) {
                $_SESSION['registerErrorMessage'] = $nick;
                header("location:register.php");
            }
        }
    }
}

function changeComment($conn, $id)
{
    if (isset($_POST['oceny']) and isset($_POST['komentarz'])) {
        $mark = $_POST['oceny'];
        $comment = $_POST['komentarz'];
        $newDate =  date('Y-m-d');
        $sql = "UPDATE comments SET mark='$mark' ,  comment='$comment'  ,  date ='$newDate' WHERE id_comm='$id'";
        if ($conn->query($sql) === TRUE) {
            header('location:index.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
}
function changeArticle($conn, $id_article)
{
    if (isset($_POST['categories']) and isset($_POST['title']) and isset($_POST['content'])) {
        $category = $_POST['categories'];
        $title = $_POST['title'];
        $content =  $_POST['content'];
        $newDate =  date('Y-m-d');
        $sql = "UPDATE article SET category='$category' ,  title='$title',  content='$content'  ,  date ='$newDate' WHERE id_article='$id_article'";
        if ($conn->query($sql) === TRUE) {
            header('location:index.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
}
function createDataTable($nick, $name, $surname, $email, $password)
{
    return "<tr><td>Nick</td><td>$nick</td></tr><tr><td>Imię</td><td>$name</td></tr><tr><td>Nazwisko</td><td>$surname</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Hasło</td><td>$password</td></tr>";
}
function checkIfDisplayed($id)
{
    $cookieName = "displayedArticle" . $id;
    if (isset($_COOKIE[$cookieName])) {
        return true;
    } else {
        return false;
    }
}
function addDisplay($id, $conn)
{
    $cookieName = "displayedArticle" . $id;
    $searchDisplaysQuery = "SELECT displays_num FROM article WHERE id_article='$id'";
    $searchDisplays = mysqli_query($conn, $searchDisplaysQuery);
    while ($row = mysqli_fetch_assoc($searchDisplays)) { // Important line !!! Check summary get row on array ..
        $displays_num = $row['displays_num'];
    }
    $newDisplaysNum = $displays_num + 1;
    $UpdateDisplaysNumQuery = "UPDATE article SET displays_num='$newDisplaysNum'  WHERE id_article='$id'";
    if ($conn->query($UpdateDisplaysNumQuery) === TRUE) {
        setcookie($cookieName, 1);
        header("location:display_article.php?id=$id");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
