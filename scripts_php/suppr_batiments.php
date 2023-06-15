<?php
include '../web/connect.php';
// deleting building

$batiment=$_POST['ID_bat'];
// check for sql injection
$batiment = mysqli_real_escape_string($con, $batiment);
// connect to the database

//delete the building
$sql = "DELETE FROM batiment WHERE `ID-bat`='$batiment'";
$result = mysqli_query($con, $sql);

//close the connection
$con->close();
header('Location: ../web/admin.php');



?>