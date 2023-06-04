<?php
// deleting building

$batiment=$_POST['batiment'];
// connect to the database
include '../connect.php';

//delete the building
$sql = "DELETE FROM batiment WHERE `ID-bat`='$batiment'";
$result = $con->query($sql);

//close the connection
$con->close();

header('Location: ../admin.php')

?>