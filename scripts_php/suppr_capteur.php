<?php
// deleting sensors

$capteur=$_POST['ID_cap'];
// connect to the database
include '../connect.php';

//delete the sensor
$sql = "DELETE FROM capteurs WHERE 'ID-cap'='$capteur'";
$result = $con->query($sql);

//close the connection
$con->close();

header('Location: ../admin.php')

?>