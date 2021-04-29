<?php
session_start();
require_once 'navbarVersions.php';
require_once 'pdo.php';
$category = $_GET['id'];
function cutArticle($article)
{
    return substr($article, 0, 200);
}
$id = $_GET['id'];
$sql = "SELECT * FROM article WHERE id_article='$category' ORDER BY id_article DESC";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
?>
<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="<? echo $fontPath; ?>" rel="stylesheet">
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
        include 'Styles/display_article.css';
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
    <section class="article-sec">
        <div class="article-align">
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
            }
            ?>
            <div id="article-photo" style="background: center/cover no-repeat url(<?php echo "'" . $imgPath . "'" ?>)"></div>
            <h1><?php echo $title; ?></h1>
            <h3><?php echo $date; ?></h3>
            <p><?php echo $content; ?></p>
            <h4><?php echo $author; ?></h4>
        </div>
    </section>
</body>

</html>