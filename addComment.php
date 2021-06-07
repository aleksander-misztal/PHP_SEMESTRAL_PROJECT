<?php
session_start();
#Sprawdza czy wiadomo o ktory art chodzi
if (!isset($_GET['id'])) {
    header("location:index.php");
} else {
    $id_article = $_GET['id'];
}
if (!isset($_SESSION['nick'])) {
    header("location:login.php");
}
require_once 'conn.php';
require_once 'func.php';
require_once 'navbarVersions.php';
if (isset($_POST['oceny']) and isset($_POST['komentarz'])) {
    $nick = $_SESSION['nick'];
    $mark = $_POST['oceny'];
    $comment = $_POST['komentarz'];
    $date = date('Y-m-d');

    $sql = "INSERT INTO comments (id_article, id_user, mark,comment,date) VALUES ('$id_article' , '$nick' , '$mark' , '$comment','$date')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("location:display_article.php?id=$id_article");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}


?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
    <meta charset="UTF-8">
    <meta name="description" content="...">
    <meta name="keywords" content="...">
    <style>
        <?php
        require 'Styles/addComment.css';
        require 'Styles/header.css';
        require 'Styles/footer.css';
        ?>
    </style>
    <title>WPRBEJBE</title>
</head>

<body>
    <section id="mainSec">
        <nav>
            <input type="checkbox" id="check" />
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">WPRBEJBE</label>
            <ul>
                <?php
                if (isset($_SESSION['nick'])) {
                    if ($_SESSION['level'] == 0) {
                        echo $levelZeroList;
                    } else {
                        echo $levelsOverZeroList;
                    }
                }
                if (!isset($_SESSION['nick'])) {
                    echo $loggedOutList;
                }
                ?>
            </ul>
        </nav>

        <div id="vertical-align">
            <div id="horizontal-align">
                <div id="regbox">
                    
                        <h1>Podziel się opinią</h1>
                    
                    <form id="loginForm" method="post">
                        <label for="oceny">Ocena:</label>

                        <select name="oceny" id="oceny">
                            <?php
                            for ($i = 10; $i >= 1; $i--) {
                                echo ' <option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select></br>
                        <textarea type="text" id="komentarz" name="komentarz" placeholder="komentarz"></textarea></br>
                        <input type="submit" id="submit" value="Przeslij">
                    </form>

                </div>
            </div>
        </div>
        </div>

</body>

</html>