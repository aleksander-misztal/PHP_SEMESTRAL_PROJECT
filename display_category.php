<?php
session_start();
require_once 'navbarVersions.php';
require_once 'pdo.php';
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="<? echo $fontPath ;?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width , initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatibile" content="IE=edge,chrome=1" />
    <!--##############-->
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
    <title>WPR Project</title>
</head>
<body>
    <nav>
        <input type="checkbox" id="check" />
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">WPRBABY</label>
        <ul>
            <?php
            if (isset($_SESSION['nick'])) {
                echo $loggedInList;
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
                <a href="display_article.php?id='.$index.'"><div id="article-btn">Czytaj dalej</div></a>
                <p id="author">' . $author . '</p>
                 </div>
                </div>';
                echo $box;
            }
            ?>

        </div>
    </section>
</body>

</html>