<?php
//check session to see if the user is connected as an administrator with the right login and password
session_start();
if (!isset($_SESSION['gestionnaire']) || $_SESSION['gestionnaire'] !== true) {
    // sebd ab alert saying that the user is not connected and redirect to index.php;
    echo "<script>alert('Vous n\'êtes pas connecté en tant que gestionnaire')</script>";
    header('Location: index.php');
    exit;


}
?>
<html lang="fr">
 <head>
  <title>Gestion</title>
  <meta charset="utf-8">
  <meta name="author" content="Daniel Halidi">
  <meta name="description" content="SAE 23, Accueil">
  <meta name="keywords" content="HTML, CSS">
  <link rel="stylesheet" type="text/css" href="../styles/style23.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../styles/tableau.css" media="screen">
  <meta content="width=device-width, initial-scale=1" name="viewport">
</head>

<body>
	<header>

		<label class="Name">SAE 23</label>
		<input class="side-menu" type="checkbox" id="side-menu">
        <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>	
		
	<nav> 
        

        <ul>
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="gestionnaire.php">Gestion</a></li>
            <li><a href="../scripts_php/deconnexion.php">Déconnexion</a></li>
        </ul>
        
    </nav>
	</header>

<main>
<?php
//connect to the database
include('connect.php');

//get the sensor id from the form
$IDcap = $_POST['ID-cap'];
$NBjour = $_POST['nbjours'];
$heuredebut = $_POST['heure1'];
$heurefin = $_POST['heure2'];

//check for sql injection
$IDcap = mysqli_real_escape_string($con, $IDcap);
$NBjour = mysqli_real_escape_string($con, $NBjour);
$heuredebut = mysqli_real_escape_string($con, $heuredebut);
$heurefin = mysqli_real_escape_string($con, $heurefin);
echo "<h2 class=\"hautpage\">Historique du capteur $IDcap</h2>";

// get the sensor history from the database using the sensor id for the last $NBjour days
$sql = "SELECT `capteurs`.*, `mesures`.*
FROM `capteurs` 
LEFT JOIN `mesures` ON `mesures`.`ID-cap` = `capteurs`.`ID-cap`
WHERE `nom` = '" . $IDcap . "'
AND `date` >= DATE_SUB(CURDATE(), INTERVAL " . $NBjour . " DAY)
AND `heure` >= '" . $heuredebut . "' AND `heure` <= '" . $heurefin . "'
ORDER BY `date` DESC, `heure` DESC";

echo '<section class="tableau">';
$result = mysqli_query($con, $sql);

//display the sensor history in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Date</th>";
    echo "<th>Heure</th>";
    echo "<th>Salle</th>";
    echo "<th>Type</th>";
    echo "<th>Valeur</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["ID-cap"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>" . $row["heure"] . "</td>";
        // dele te " " from the room name
        $row["Salle"] = str_replace('"', "", $row["Salle"]);

        echo "<td>" . $row["Salle"] . "</td>";
        if ($row["type"] == "Temperature") {
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["valeur"] . "°C</td>";
        } if ($row["type"] == "Humidite") {
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["valeur"] . " %</td>";
        }if ($row["type"] == "CO2") {
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["valeur"] . " ppm</td>";
        }if ($row["type"] == "Luminosite") {
            echo "<td>" . $row["type"] . "</td>";
            echo "<td>" . $row["valeur"] . " lux</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class=\"erreur\">Aucune donnée</p>";
}
echo '</section>';
$con->close();
?>

</main>

<footer>

    <ul class="liste">
        <li>
            <a href="https://www.iut-blagnac.fr/fr/" target="_blank">Iut de Blagnac</a>
        </li>
        <li>
            <a href="https://www.iut-blagnac.fr/fr/formations/but-rt" target="_blank">Etudiants en R&T</a>
        </li>
        <li>
            <a href="https://github.com/staringhan/SAE23">GitHub</a>
        </li>
        <li>
            <a href="mentionsleg.html" >Mentions légales</a>
        </li>
    </ul>

<p class="copyright">BESSAIAH-BONVENT-GIRARD-HALIDI @ 2023</p>
    <p class="Validator">Languages utilisés</p> 
    <a href="#" target="_blank"><img class="validator" src="../media/htmllogo.png" alt="HTML 5 Valide"></a>
    <a href="#" target="_blank"><img class="validator" src="../media/csslogo.png" alt="CSS 3 Valide"></a>
   
</footer>

</body>

</html>