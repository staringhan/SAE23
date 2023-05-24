<?php
#basic html page with a table with 3 columns and n rows named "salle", "capteurs" and "valeurs"
#connect to the database
include 'connect.php';
//make the request and fetch the data
$sql = "SELECT `capteurs`.*, `mesures`.* FROM `capteurs` LEFT JOIN `mesures` ON `mesures`.`ID-cap` = `capteurs`.`ID-cap`";
$result = mysqli_query($con, $sql);
//display the data in a table
if (mysqli_num_rows($result) > 0) {
  echo "<table><tr><th>salle</th><th>capteurs</th><th>valeurs</th></tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["nom"]."</td><td>".$row["type"]."</td><td>".$row["valeur"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
?>