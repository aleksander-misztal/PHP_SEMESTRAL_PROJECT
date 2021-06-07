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
                    if($_SESSION['level']==0){
                        echo $levelZeroList;
                    }
                    else{
                        echo $levelsOverZeroList;
                    }
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