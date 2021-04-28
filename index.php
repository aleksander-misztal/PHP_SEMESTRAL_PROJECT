<?php
session_start();
require_once 'navbarVersions.php';

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
        require 'Styles/style.css';
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

        <div id="mainSecAlign">


            <div class="features1-align">
                <h1>O czym chcesz czytać ?</h1>

                <div class="features1-box-align">
                    <div class="features1-box">
                        <a href="display_category.php?category=Formula1">
                            <div class="boxImage" id="f1-logo"></div>
                        </a>
                        <h4></h4>
                    </div>
                </div>
                <div class="features1-box-align">
                    <div class="features1-box">
                        <a href="display_category.php?category=Formula2">
                            <div class="boxImage" id="f2-logo"></div>
                        </a>
                        <h4></h4>
                    </div>
                </div>
                <div class="features1-box-align">
                    <div class="features1-box">
                        <a href="display_category.php?category=UFC">
                            <div class="boxImage" id="ufc-logo"></div>
                        </a>
                        <h4></h4>
                    </div>
                </div>
                <div class="features1-box-align">
                    <div class="features1-box">
                        <a href="display_category.php?category=VolvoOceanRace">
                            <div class="boxImage" id="vor-logo"></div>
                        </a>
                        <h4></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-tags">
            <ul>
                <li><a href="#"><i class="fa fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fab fa-twitter"></i></a></li>


            </ul>
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="display_category.php?category=f1">F1</a></li>
                <li><a href="display_category.php?category=f2">F2</a></li>
                <li><a href="display_category.php?category=ufc">UFC</a></li>
                <li><a href="display_category.php?category=vor">Volvo ocean race</a></li>

                <li><a href="terms.php">Regulamin</a></li>
            </ul>
        </div>
        <div class="footer-copyright">
            <p>GEEKBROS © 2020</p>
        </div>
    </footer>

</body>

</html>