<?php
session_start();
require_once 'navbarVersions.php';
require_once 'conn.php';
require_once 'func.php';
if (!isset($_SESSION['nick'])) {
    session_destroy();
    header('location:index.php');
}
$nick = $_SESSION['nick'];
$sql = "SELECT nick,name,surname,email,password FROM users WHERE nick='$nick'";
$basePass = $conn->query($sql);
if ($basePass->num_rows > 0) {
    while ($row = $basePass->fetch_assoc()) {
        $name = $row['name'];
        $surname = $row['surname'];
        $email = $row['email'];
        $password = $row['password'];
    }
    $tableData = createDataTable($nick, $name, $surname, $email, $password);
} else {
    echo "błędny login";
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
        require 'Styles/userPanelStyle.css';
        require 'Styles/header.css';
        require 'Styles/footer.css';
        ?>
    </style>
    <title>PROJEKT WPR</title>
</head>

<body>
    <section id="mainSec">
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
        <div id="vertical-align">
            <div id="horizontal-align">
                <div id="databox">
                    <h1>Twoje dane</h1>

                    <table>
                        <?php
                        echo $tableData;
                        ?>
                    </table>
                    <a href="changeData.php">
                        <div class="userPanelButton" id="changeDataButton">Zmień dane</div>
                    </a>
                    <a href="deleteAccount.php">
                        <div class="userPanelButton" id="deleteAccountButton">Usuń konto</div>
                    </a>
                    <h1>Twoje komentarze</h1>
                    <table>
                        <tr>
                            <th>Ocena</th>
                            <th>Komentarz</th>
                            <th>Data</th>
                            <th>Akcja</th>
                        </tr>
                        <?php
                        $searchCommsQuery = "SELECT id_comm,mark,comment,date FROM comments WHERE id_user='$nick'";
                        $searchComms = mysqli_query($conn, $searchCommsQuery);
                        while ($row = mysqli_fetch_assoc($searchComms)) {
                            $id_comm = $row['id_comm'];
                            $mark = $row['mark'];
                            $comment = $row['comment'];
                            $date = $row['date'];
                            echo '<tr>';
                            echo '<td>' . $mark . '</td>';
                            echo '<td>' . $comment . '</td>';
                            echo '<td>' . $date . '</td>';
                            echo '<td><a href="changeComment.php?id=' . $id_comm . '">edytuj</a>/<a href="deleteComment.php?id=' . $id_comm . '">usuń</a></td>';
                        }


                        ?>


                    </table>
                    <?php
                    if ($_SESSION['level'] > 0) {
                        echo '<h1>Twoje Artykuły</h1>
                            <table>
                            <tr>
                                <th>Kategoria</th>
                                <th>Wyś</th>
                                <th>Tytuł</th>
                                <th>Data</th>
                                <th>Akcja</th>
                            </tr>';

                        $searchArticlesQuery = "SELECT id_article,category,title,date,displays_num FROM article WHERE nick='$nick'";
                        $searchArticles = mysqli_query($conn, $searchArticlesQuery);
                        while ($row = mysqli_fetch_assoc($searchArticles)) {
                            $id_article = $row['id_article'];
                            $category = $row['category'];
                            $displays_num = $row['displays_num'];
                            $title = $row['title'];
                            $date = $row['date'];
                            echo '<tr>';
                            echo '<td>' . $category . '</td>';
                            echo '<td>' . $displays_num . '</td>';
                            echo '<td>' . $title . '</td>';
                            echo '<td>' . $date . '</td>';
                            echo '<td><a href="changeArticle.php?id=' . $id_article . '">edytuj</a>/<a href="deleteArticle.php?id=' . $id_article . '">usuń</a></td>';
                        }
                    }
                    ?>


                    </table>
                </div>
            </div>
        </div>

</body>

</html>