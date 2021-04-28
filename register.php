<?php
session_start();
if (isset($_SESSION['nick'])) {
    header('location:index.php');
}
require_once 'pdo.php';
require_once 'func.php';
register($conn);
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
        require 'Styles/registerStyle.css';
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
                <div id="regbox">
                    <div id="regbox-pic">
                        <h1>Rejestracja</h1>
                    </div>
                        <form id="loginForm" method="post">
                            <input type="text" id="nick" name="nick" placeholder="nick"></br>
                            <input type="text" id="name" name="name" placeholder="imie"></br>
                            <input type="text" id="surname" name="surname" placeholder="nazwisko"></br>
                            <input type="text" id="email" name="email" placeholder="email"></br>
                            <input type="password" id="password" name="password" placeholder="hasło"></br>
                            <input type="password" id="check_password" name="check_password" placeholder="Potwierdń hasło"></br>
                            <input type="submit" id="submit" value="Rejestracja">
                        </form>
                        <a href="login.php">Logowanie</a>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>