<?php
session_start();
if (!isset($_SESSION['nick'])) {
    session_destroy();
    header('location:index.php');
}
$nick = $_SESSION['nick'];





require_once 'conn.php';
require_once 'navbarVersions.php';
require_once 'func.php';

//Wpisz dane konta do formularza
$sql = "SELECT name,surname,email,password FROM users WHERE nick='$nick'";
$basePass = $conn->query($sql);
if ($basePass->num_rows > 0) {
    while ($row = $basePass->fetch_assoc()) {
        $name = $row['name'];
        $surname = $row['surname'];
        $email = $row['email'];
        $password = $row['password'];
    }
}
if (isset($_POST['nick']) and isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['email']) and isset($_POST['password'])) {
    $newNick = $_POST['nick'];
    $newName = $_POST['name'];
    $newSurname = $_POST['surname'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];
    //FORMATOWANIE
    $newName = strtolower($newName);
    $newName = ucfirst($newName);
    $newSurname = strtolower($newSurname);
    $newSurname = ucfirst($newSurname);
    
    $sql = "UPDATE users SET nick='$newNick' ,  name='$newName'  ,  surname ='$newSurname'  ,  email='$newEmail'  ,  password='$newPassword'  WHERE nick='$nick'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['nick'] = $newNick;
        header('location:userPanel.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
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
        require 'Styles/changeDataStyle.css';
        require 'Styles/header.css';
        require 'Styles/footer.css';
        ?>
    </style>
    <title>WPR PROJEKT</title>
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

                    <h1>Zmień dane</h1>

                    <form id="changeDataForm" method="post">
                        <label for="nick">Nick:</label></br>
                        <input type="text" id="nick" name="nick" placeholder="nick" value="<?php echo $nick; ?>"></br>
                        <label for="name">Imie:</label></br>
                        <input type="text" id="name" name="name" placeholder="imie" value="<?php echo $name; ?>"></br>
                        <label for="surname">Nazwisko:</label></br>
                        <input type="text" id="surname" name="surname" placeholder="nazwisko" value="<?php echo $surname; ?>"></br>
                        <label for="email">Email:</label></br>
                        <input type="text" id="email" name="email" placeholder="email" value="<?php echo $email; ?>"></br>
                        <label for="password">Hasło:</label></br>
                        <input type="text" id="password" name="password" placeholder="hasło" value="<?php echo $password; ?>"></br>
                        <input type="submit" id="submit" value="Zmień">
                    </form>
                </div>
            </div>
        </div>
        </div>


</body>

</html>