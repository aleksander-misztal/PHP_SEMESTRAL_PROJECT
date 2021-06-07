<?php
session_start();
if (!isset($_SESSION['nick']) or !isset($_GET['id'])) {
    header('location:index.php');
}
$nick = $_SESSION['nick'];
$id_comm = $_GET['id'];
require_once 'conn.php';
require_once 'navbarVersions.php';
require_once 'func.php';

//Wpisz dane konta do formularza
$sql = "SELECT * FROM comments WHERE id_comm='$id_comm'";
$basePass = $conn->query($sql);
if ($basePass->num_rows > 0) {
    while ($row = $basePass->fetch_assoc()) {
        $mark = $row['mark'];
        $comment = $row['comment'];
    }
}
//Zaktualizuj dane
changeComment($conn, $id_comm);

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
        require 'Styles/changeComment.css';
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
                    
                        <h1>Edytuj Komentarz</h1>
                   
                    <form id="loginForm" method="post">
                        <label for="oceny">Ocena:</label></br>

                        <select name="oceny" id="oceny">
                            <?php
                            for ($i = 10; $i >= 1; $i--) {
                                echo ' <option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select></br>
                        <textarea type="text" id="komentarz" name="komentarz" placeholder="<?php echo $comment; ?>"></textarea></br>
                        <input type="submit" id="submit" value="Uaktualnij">
                    </form>

                </div>
            </div>
        </div>
        </div>


</body>

</html>