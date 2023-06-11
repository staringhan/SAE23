<?php
// Simple adding of buildings to the database from a form

// Connect to the database
include '../web/connect.php';

//set the variables, ID-bat, nom, login, mdp
$IDcap = $_POST['ID-cap'];
$nom = $_POST['nom'];
$IDbat = $_POST['ID-bat'];

//insert in the table
$sql = "INSERT INTO capteurs (`ID-cap`, `nom`, `ID-bat`) VALUES ('$IDcap', '$nom', '$IDbat')";
$result = $con->query($sql);


//close the connection
$con->close();
header('Location: ../web/admin.php')

?>