<?php
// deleting building

$batiment=$_POST['ID_bat'];
// connect to the database
include '../web/connect.php';

//delete the building
$sql = "DELETE FROM batiment WHERE `ID-bat`='$batiment'";
$result = $con->query($sql);

//close the connection
$con->close();
header('Location: ../web/admin.php');


?>