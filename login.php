<?php
session_start();
require_once 'conn.php';
require_once 'func.php';
require_once 'navbarVersions.php';
if (isset($_SESSION['nick'])) {
    header('location:index.php');
}

if (isset($_POST['nick']) and isset($_POST['password'])) {

    $nick = $_POST['nick'];
    $password = $_POST['password'];
    $loginErrorMessage = null;
    $sql = "SELECT password,level FROM users WHERE nick='$nick'";
    $basePass = $conn->query($sql);
    if ($basePass->num_rows > 0) {
        while ($row = $basePass->fetch_assoc()) {
            if ($password == $row["password"]) {
                $_SESSION['nick'] = $nick;
                $_SESSION['level'] = $row["level"];
                header("location:index.php");
            }
            if ($password != $row["password"]) {
                $loginErrorMessage = "złe hasło";
            }
        }
    } else {
        $loginErrorMessage = "błędny login";
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
        require 'Styles/loginStyle.css';
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
                <div id="logbox">
                    <h1>Zaloguj się</h1>
                    <form id="loginForm" method="post">
                        <input type="login" id="nick" name="nick" placeholder="nick"></br>
                        <input type="password" id="password" name="password" placeholder="hasło">
                        <?php
                        if (isset($loginErrorMessage)) {
                            echo '</br><label style="color:red">' . $loginErrorMessage . '</label>';
                        }
                        ?>
                        </br><input type="submit" id="submit" value="Zaloguj">
                    </form>
                    <a href="register.php">Rejestracja</a>
                </div>
            </div>
        </div>
        </div>

</body>

</html>