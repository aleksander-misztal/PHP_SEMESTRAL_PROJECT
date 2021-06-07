<?php
session_start();
if (!isset($_SESSION['nick']) or !isset($_GET['id']) or $_SESSION['level']==0) {
    header('location:index.php');
}
$nick = $_SESSION['nick'];
$id_article = $_GET['id'];
require_once 'conn.php';
require_once 'navbarVersions.php';
require_once 'func.php';

//Wpisz dane konta do formularza
$searchArticleQuery = "SELECT * FROM article WHERE id_article='$id_article'";
$searchArticle = $conn->query($searchArticleQuery);
if ($searchArticle->num_rows > 0) {
    while ($row = $searchArticle->fetch_assoc()) {
        $category = $row['category'];
        $title = $row['title'];
        $content = $row['content'];
    }
}
//Zaktualizuj dane
changeArticle($conn, $id_article);

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
        require 'Styles/changeComment.css';
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
                    <div id="regbox-pic">
                        <h1>Zmień Artykuł</h1>
                    </div>
                    <form id="loginForm" method="post">
                        <label for="oceny">Kategoria:</label></br>

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
                        <textarea type="text" id="title" name="title" ><?php echo $title; ?></textarea></br>
                        <textarea type="text" id="content" name="content"><?php echo $content; ?></textarea></br>
                        <input type="submit" id="submit" value="Uaktualnij">
                    </form>

                </div>
            </div>
        </div>
        </div>


</body>

</html>