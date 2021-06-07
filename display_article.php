<?php
session_start();
require_once 'navbarVersions.php';
require_once 'func.php';
require_once 'conn.php';
$id = $_GET['id'];
if (checkIfDisplayed($id) == false) {
    addDisplay($id, $conn);
}
function cutArticle($article)
{
    return substr($article, 0, 200);
}
$sql1 = "SELECT * FROM article WHERE id_article='$id' ORDER BY id_article DESC";
$displayArticle = mysqli_query($conn, $sql1); // First parameter is just return of "mysqli_connect()" function
$sql2 = "SELECT * FROM comments WHERE id_article='$id'";
$displayComm = mysqli_query($conn, $sql2); // First parameter is just return of "mysqli_connect()" functi


$count = "SELECT COUNT(*) AS size FROM comments WHERE id_article='$id'";
$sizenum = mysqli_query($conn, $count);
while ($row = mysqli_fetch_assoc($sizenum)) {
    $size = $row['size'];
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
        include 'Styles/header.css';
        include 'Styles/footer.css';
        include 'Styles/display_article.css';
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
    <section class="article-sec">
        <div class="article-align">
            <?php
            while ($row = mysqli_fetch_assoc($displayArticle)) { // Important line !!! Check summary get row on array ..
                $_SESSION['index_art'] = $row['id_article'];
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
            <h1 id="titleArt"><?php echo $title; ?></h1>
            <h3 id="dateArt"><?php echo $date; ?></h3>
            <p id="contentArt"><?php echo $content; ?></p>
            <h4 id="authorArt"><?php echo $author; ?></h4>
        </div>
    </section>


    <section id="commentsContainer">
        <h1 style="text-align:center">Komentarze <?php echo $size; ?></h1>

        <?php
        while ($row2 = mysqli_fetch_assoc($displayComm)) { // Important line !!! Check summary get row on array ..
            $id_comm = $row2['id_comm'];
            $nick = $row2['id_user'];
            $date = $row2['date'];
            $mark = $row2['mark'];
            $content = $row2['comment'];
            if (isset($_SESSION['nick'])) {
                if ($nick == $_SESSION['nick']) {
                    $box = ' 
                    <div class="commBox">
                    <h4>' . $nick . ' | ' . $date . ' | ' . $mark . '/10</h4>
                    <p>' . $content . '</p>
                    <a href="changeComment.php?id=' . $id_comm . '">
                    <div class="commButton" id="commEdit">Edytuj</div>
                    </a>
    
                    <a href="deleteComment.php?id_comm=' . $id_comm . '&id_article=' . $id . '">
                    <div class="commButton" id="commDelete">Usuń</div>
                    </a>
                    </div>';
                } elseif (($nick != $_SESSION['nick']) and $_SESSION['level'] == 2) {
                    $box = ' 
                    <div class="commBox">
                    <h4>' . $nick . ' | ' . $date . ' | ' . $mark . '/10</h4>
                    <p>' . $content . '</p>
                   
                    <a href="deleteComment.php?id_comm=' . $id_comm . '&id_article=' . $id . '">
                    <div class="commButton" id="commDelete">Usuń</div>
                    </a>
                    </div>';
                } else {
                    $box = ' 
                <div class="commBox">
                <h4>' . $nick . ' | ' . $date . ' | ' . $mark . '/10</h4>
                <p>' . $content . '</p>
                </div>';
                }
            } else {
                $box = ' 
                <div class="commBox">
                <h4>' . $nick . ' | ' . $date . ' | ' . $mark . '/10</h4>
                <p>' . $content . '</p>
                </div>';
            }
            echo $box;
        }

        if (isset($_SESSION['nick'])) {
            echo '<a href="addComment.php?id=' . $id . '">';
            echo '<div id="commButton">Napisz</div>';
            echo '</a>';
        }
        if (isset($_SESSION['level']) and isset($_SESSION['level']) == 2) {
        echo '    <a href="deleteArticle.php?id='.$id.'">Usuń artykuł</a>';
        }
        ?>
    
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