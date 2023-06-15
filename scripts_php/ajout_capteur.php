<?php
// Simple adding of buildings to the database from a form

// Connect to the database
include '../web/connect.php';

//set the variables, ID-bat, nom, login, mdp
$IDcap = $_POST['ID-cap'];
$nom = $_POST['nom'];
$IDbat = $_POST['ID-bat'];

// check for sql injection
$IDcap = mysqli_real_escape_string($con, $IDcap);
$nom = mysqli_real_escape_string($con, $nom);
$IDbat = mysqli_real_escape_string($con, $IDbat);

//insert in the table
$sql = "INSERT INTO capteurs (`ID-cap`, `nom`, `ID-bat`) VALUES ('$IDcap', '$nom', '$IDbat')";
$result = mysqli_query($con, $sql);


//close the connection
$con->close();
header('Location: ../web/admin.php')

?>