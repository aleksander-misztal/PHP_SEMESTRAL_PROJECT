<?php
session_start();
require_once 'pdo.php';
require_once 'func.php';

if (isset($_SESSION['nick'])) {
    header('location:index.php');
}

if (isset($_POST['nick']) and isset($_POST['password'])) {

    $nick = $_POST['nick'];
    $password = $_POST['password'];
    login($nick, $password, $conn);
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
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Kokpit</a></li>
                <li><a href="login.php">Logowanie</a></li>
                <li><a href="register.php">Rejestracja</a></li>

            </ul>
        </nav>

        <div id="vertical-align">
            <div id="horizontal-align">
                <div id="logbox">
                    <div id="logbox-pic">
                        <h1>LOGIN</h1>
                    </div>
                    <form id="loginForm" method="post">
                        <input type="login" id="nick" name="nick" placeholder="nick"></br>
                        <input type="password" id="password" name="password" placeholder="hasło"></br>
                        <input type="submit" id="submit" value="Zaloguj">
                    </form>
                    <a href="register.php">Rejestracja</a>
                </div>
            </div>
        </div>
        </div>

</body>

</html>