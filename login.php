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
} else {
    $sql = "SELECT `login`, `mdp` FROM `batiment` WHERE `login` = '$login' AND `mdp` = '$password'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "You are connected as a building manager";
    } else {
        echo "You are not connected";
    }
}
?>