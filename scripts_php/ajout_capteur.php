<?php
// Simple adding of buildings to the database from a form

// Connect to the database
include '../connect.php';

//set the variables, ID-bat, nom, login, mdp
$IDcap = $_POST['ID-cap'];
$nom = $_POST['nom'];
$IDbat = $_POST['ID-bat'];

//insert in the table
$sql = "INSERT INTO capteur (`ID-cap`, nom, ID_bat) VALUES ('$IDcap', '$nom', '$IDbat')";
$result = $con->query($sql);


//close the connection
$con->close();
header('Location: ../admin.php')

?>