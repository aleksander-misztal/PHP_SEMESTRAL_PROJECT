<?php
session_start();
require_once 'navbarVersions.php';
require_once 'pdo.php';
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
$conn->close();
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
                    echo $loggedInList;
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
                </div>
            </div>
        </div>
</body>
</html>