<?php
session_start();
if (isset($_SESSION['nick'])) {
    header('location:index.php');
}
require_once 'conn.php';
require_once 'navbarVersions.php';
require_once 'func.php';

if (isset($_POST['nick']) and isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['check_password'])) {
    $nick = $_POST['nick'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_password = $_POST['check_password'];
    $accountLevel = 0;


    function checkIfLoginExists($nick, $conn)
    {
        $checkIfNickExistsQuery = "SELECT * FROM users WHERE nick='$nick'";
        $checkIfNickExists = $conn->query($checkIfNickExistsQuery);
        if ($checkIfNickExists->num_rows > 0) {
            while ($row = $checkIfNickExists->fetch_assoc()) {
                if ($nick == $row["nick"]) {
                    return 1;
                }
            }
        }
        return 0;
    }

    if (($nick != "") and ($name != "") and ($surname != "") and ($email != "") and ($password != "") and ($check_password != "")) {
        if ($password != $check_password) {
            $_SESSION['registerErrorMessage'] = "Hasła się nie zgadzają";
            header('location:register.php');
        } elseif (checkIfLoginExists($nick, $conn) == 1) {
            $_SESSION['registerErrorMessage'] = "Podany login już istnieje";
            header('location:register.php');
        } else {
            //FORMATOWANIE
            $name = strtolower($name);
            $name = ucfirst($name);
            $surname = strtolower($surname);
            $surname = ucfirst($surname);
            
            $sql = "INSERT INTO users (nick, name, surname,email,password,level) VALUES ('$nick' , '$name' , '$surname' , '$email','$password','$accountLevel')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['nick'] = $nick;
                $_SESSION['level'] = 0;
                unset($_SESSION['registerErrorMessage']);
                header("location:userPanel.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        $_SESSION['registerErrorMessage'] = "Wszystkie pola wymagane";
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
        require 'Styles/registerStyle.css';
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
                <div id="regbox">

                    <h1>Załóż konto</h1>

                    <form id="loginForm" method="post">
                        <input type="text" id="nick" name="nick" placeholder="nick"></br>
                        <input type="text" id="name" name="name" placeholder="imie"></br>
                        <input type="text" id="surname" name="surname" placeholder="nazwisko"></br>
                        <input type="text" id="email" name="email" placeholder="email"></br>
                        <input type="password" id="password" name="password" placeholder="hasło"></br>
                        <input type="password" id="check_password" name="check_password" placeholder="Potwierdń hasło">
                        <?php
                        if (isset($_SESSION['registerErrorMessage'])) {
                            echo '</br><label style="color:red">' . $_SESSION['registerErrorMessage'] . '</label>';
                        }

                        ?>
                        </br><input type="submit" id="submit" value="Rejestracja">
                    </form>
                    <a href="login.php">Logowanie</a>
                </div>
            </div>
        </div>
        </div>

</body>

</html>