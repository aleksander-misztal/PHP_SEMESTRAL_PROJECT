<?php
session_start();
require_once 'navbarVersions.php';
require_once 'conn.php';
$category = $_GET['category'];
function cutArticle($article)
{
    return substr($article, 0, 200);
}
$sql = "SELECT * FROM article WHERE category='$category' ORDER BY id_article DESC";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
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
        include 'Styles/header.css';
        include 'Styles/footer.css';
        include 'Styles/display_category.css';
        ?>
    </style>
    <title>PROJEKT WPR</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">PROJEKT WPR</label>
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
    <section class="featuresboxed-sec">
        <div class="featuresboxed-sec-title">

            <h1><?php echo $category; ?></h1>
        </div>
        <div class="featuresboxed-align">
            <?php
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                $index = $row['id_article'];
                $title = $row['title'];
                $content = $row['content'];
                $name_author = $row['name_author'];
                $surname_author = $row['surname_author'];
                $date = $row['date'];
                $author = $name_author . " " . $surname_author;

                $imgPath = "IMG/ArticlesImg/" . $row['photo_name'] . ".jpg";

                $box = '<div class="featuresboxed-box-cont">
                <div class="featuresboxed-box-cont-inside">
                <div class="photoArticle" style="background: center/cover no-repeat url(' . $imgPath . ');"></div>
                <h1>' . $title . '</h1>
                <p id="date">' . $date . "</br>" . $row['displays_num'] . " Wyświetleń" .  '</p></br>
                <p>' . cutArticle($content) . '... </p></br>
                <a href="display_article.php?id=' . $index . '"><div id="article-btn">Czytaj dalej</div></a>
                <p id="author">' . $author . '</p>
                 </div>
                </div>';
                echo $box;
            }
            ?>

        </div>
    </section>

    <footer>
        <div class="footer-tags">
            <a href="#" id="fb-link"> <i class="fa fab fa-facebook-square"></i></a>
            <a href="#" id="insta-link"> <i class="fa fab fa-instagram"></i></a>
        </div>
        <div class="footer-links">
            <a href="index.php"> Home</a>
            <a href="display_category.php?category=Formula1"> F1</i></a>
            <a href="display_category.php?category=Formula2"> F2</i></a>
            <a href="display_category.php?category=UFC"> UFC</a>
            <a href="display_category.php?category=VolvoOceanRace"> Volvo Ocean Race</a>
        </div>
        <div class="footer-copyright">
            <p>WPR Project © 2021</p>
        </div>
    </footer>
</body>

</html>