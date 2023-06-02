<?php
// deleting building

$batiment=$_POST['batiment'];
// connect to the database
include 'connect.php';

//delete the building
$sql = "DELETE FROM batiment WHERE nom='$batiment'";
$result = $conn->query($sql);

//close the connection
$conn->close();


?>