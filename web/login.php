<?php
//connexion with form to connect to the database
include 'connect.php';
//get the data from the form
$login = $_POST['login'];
$password = $_POST['password'];
//make the request
$sql = "SELECT * FROM `admin` WHERE `login` = '$login' AND `mdp` = '$password'";

$result = mysqli_query($con, $sql);
//check if the request is correct
if (mysqli_num_rows($result) > 0) {
  echo "You are connected as an administrator";
  //open session 
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['admin'] = true;
    header('Location: admin.php');
} else {
    $sql = "SELECT `login`, `mdp` FROM `batiment` WHERE `login` = '$login' AND `mdp` = '$password'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "You are connected as a building manager";
        //open session
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['gestionnaire'] = true;

        //request the building id of this user in the database
        $sql = "SELECT `ID-bat` FROM `batiment` WHERE `login` = '$login' AND `mdp` = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $_SESSION['ID-bat'] = $row['ID-bat'];
        header('Location: gestionnaire.php');
    
    } else {
        echo "<script type='text/javascript'>alert('Wrong login or password');</script>";
        // Redirect to the login page after a brief delay
        echo "<script type='text/javascript'> window.location.href = 'connexion.php'; </script>";
        exit;
    }
}
?>