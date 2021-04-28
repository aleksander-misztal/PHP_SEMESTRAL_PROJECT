<?php
function login($nick, $password, $conn)
{
    $sql = "SELECT password FROM users WHERE nick='$nick'";
    $basePass = $conn->query($sql);
    if ($basePass->num_rows > 0) {
        while ($row = $basePass->fetch_assoc()) {
            if ($password == $row["password"]) {
                echo "zalogowano";
                $_SESSION['nick'] = $nick;
                header("location:index.php");
            }
            if ($password != $row["password"]) {
                echo "zle haslo";
            }
        }
    } else {
        echo "błędny login";
    }
    $conn->close();
}
function register($conn)
{
    if (isset($_POST['nick']) and isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['check_password'])) {
        $nick = $_POST['nick'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $check_password = $_POST['check_password'];
        $accountLevel = 0;
        $sql = "INSERT INTO users (nick, name, surname,email,password,level) VALUES ('$nick' , '$name' , '$surname' , '$email','$password','$accountLevel')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            $_SESSION['nick'] = $nick;
            header("location:userPanel.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}
function changeData($conn, $nick)
{
    if (isset($_POST['nick']) and isset($_POST['name']) and isset($_POST['surname']) and isset($_POST['email']) and isset($_POST['password'])) {
        $newNick = $_POST['nick'];
        $newName = $_POST['name'];
        $newSurname = $_POST['surname'];
        $newEmail = $_POST['email'];
        $newPassword = $_POST['password'];
        $sql = "UPDATE users SET nick='$newNick' ,  name='$newName'  ,  surname ='$newSurname'  ,  email='$newEmail'  ,  password='$newPassword'  WHERE nick='$nick'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['nick'] = $newNick;
            header('location:userPanel.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
}
function createDataTable($nick, $name, $surname, $email, $password)
{
    return "<tr><td>Nick</td><td>$nick</td></tr><tr><td>Imię</td><td>$name</td></tr><tr><td>Nazwisko</td><td>$surname</td></tr><tr><td>Email</td><td>$email</td></tr><tr><td>Hasło</td><td>$password</td></tr>";
}
