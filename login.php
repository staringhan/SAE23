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
        header('Location: gestionnaire.php');
    
    } else {
        echo "You are not connected";
    }
}
?>