<?php
// Simple adding of buildings to the database from a form

// Connect to the database
include '../web/connect.php';

//set the variables, ID-bat, nom, login, mdp
$ID_bat = $_POST['ID_bat'];
$nom = $_POST['nom'];
$login = $_POST['login'];
$mdp = $_POST['mdp'];


//check for sql injection
$ID_bat = mysqli_real_escape_string($con, $ID_bat);
$nom = mysqli_real_escape_string($con, $nom);
$login = mysqli_real_escape_string($con, $login);
$mdp = mysqli_real_escape_string($con, $mdp);

//ash the password
$mdp = hash('sha256', $mdp);

// Insert the values into the database
$sql ="INSERT INTO batiment (`ID-bat`, nom, login, mdp) VALUES ('$ID_bat', '$nom', '$login', '$mdp')";
$result = $con->query($sql);


//close the connection
$con->close();

header('Location: ../web/admin.php')
?>