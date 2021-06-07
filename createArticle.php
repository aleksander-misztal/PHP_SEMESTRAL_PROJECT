<?php
session_start();
if (!isset($_SESSION['nick']) or $_SESSION['level'] == 0) {
    header('location:index.php');
}
require_once 'conn.php';
require_once 'func.php';
require_once 'navbarVersions.php';

if (isset($_POST['categories']) and isset($_POST['title']) and isset($_POST['content'])) {
    $nick = $_SESSION['nick'];
    $category = $_POST['categories'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');
    $searchAuthorName = "SELECT name,surname FROM users WHERE nick='$nick'";
    $searchAuthor = mysqli_query($conn, $searchAuthorName);
    while ($row = mysqli_fetch_assoc($searchAuthor)) {
        $name = $row['name'];
        $surname = $row['surname'];
    }
    $photoname = $category;
    $createArticleQuery = "INSERT INTO article (category, nick, name_author,surname_author,title,content,	date,displays_num,photo_name) VALUES ('$category' ,'$nick' , '$name' , '$surname' , '$title','$content','$date',0,'$photoname')";
    if ($conn->query($createArticleQuery) === TRUE) {
        $_SESSION['nick'] = $nick;
        header("location:userPanel.php");
    } else {
        echo "Error: " . $createArticleQuery . "<br>" . $conn->error;
    }
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
        require 'Styles/createArticle.css';
        require 'Styles/header.css';
        require 'Styles/footer.css';
        ?>
    </style>
    <title>WPR PROJEKT</title>
</head>

<body>
    <section id="mainSec">
        <nav>
            <input type="checkbox" id="check" />
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <label class="logo">WPR PROJEKT</label>
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

                    <h1>Napisz Artykuł</h1>

                    <form id="loginForm" method="post">
                        <label for="oceny">Kategoria:</label>

                        <select name="categories" id="categories">
                            <?php
                            $searchCategoriesQuery = "SELECT * FROM categories";
                            $SearchCategories = $conn->query($searchCategoriesQuery);
                            if ($SearchCategories->num_rows > 0) {
                                while ($row = $SearchCategories->fetch_assoc()) {
                                    $name = $row['name'];
                                    echo ' <option value="' . $name . '">' . $name . '</option>';
                                }
                            }
                            ?>
                        </select></br>
                        <textarea type="text" id="title" name="title" placeholder="tytuł"></textarea></br>
                        <textarea type="text" id="content" name="content" placeholder="treść"></textarea></br>
                        <!--  <label for="myfile">Dodaj Zdjęcie:</label></br>
                        <input type="file" id="myfile" name="myfile">-->
                        <input type="submit" id="submit" value="Opublikuj">
                    </form>

                </div>
            </div>
        </div>
        </div>

</body>

</html>