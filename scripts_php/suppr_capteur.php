<?php
// deleting sensors
include '../web/connect.php';
$capteur=$_POST['ID-cap'];
// check for sql injection
$capteur = mysqli_real_escape_string($con, $capteur);
// connect to the database


//delete the sensor
$sql = "DELETE FROM `capteurs` WHERE `capteurs`.`ID-cap` = '$capteur'";
$result = mysqli_query($con, $sql);

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