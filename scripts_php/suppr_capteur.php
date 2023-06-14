<?php
// deleting sensors

$capteur=$_POST['ID-cap'];
// check for sql injection
$capteur = mysqli_real_escape_string($con, $capteur);
// connect to the database
include '../web/connect.php';

//delete the sensor
$sql = "DELETE FROM `capteurs` WHERE `capteurs`.`ID-cap` = '$capteur'";
$con->query($sql);

//check if the sensor is deleted
$sql = "SELECT * FROM capteurs WHERE 'ID-cap'='$capteur'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    echo "Error deleting record";
} else {
    echo "Record deleted successfully";
    header('Location: ../web/admin.php');
}


//close the connection
$con->close();



?>