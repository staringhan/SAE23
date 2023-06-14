<!DOCTYPE html>
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
            <li><a class="current" href="#">Gestion</a></li>
            <li><a href="../scripts_php/deconnexion.php">Déconnexion</a></li>
        </ul>
        
    </nav>
	</header>

<main>


    <h2 class="hautpage">Gestion des batiments</h2>

<?php
//connect to the database
include('connect.php');

//get the building id of the user
$IDbat = $_SESSION['ID-bat'];

//form to select the sensor to visualizethe data of

//sql query to get the list of sensors in the building
$sql = "SELECT `nom`, `ID-bat` 
FROM `capteurs` 
WHERE `ID-bat` = \"$IDbat\"";
$result = mysqli_query($con, $sql);

//if there is at least one sensor in the building
if (mysqli_num_rows($result) > 0) {
    //create a form to select the sensor
    echo "<section>";
    echo "<h3>Choisissez un capteur</h3>";
    echo "<form action=\"affichage_cap.php\" method=\"post\">";
    echo "<select name=\"ID-cap\" id=\"ID-cap\">";
    //for each sensor in the building
    while ($row = mysqli_fetch_assoc($result)) {
        //create an option with the sensor id as value and the sensor name as text
        echo "<option value=\"" . $row["nom"] . "\">" . $row["nom"] . "</option>";
    }
    echo "</select>";
    //choice of the number of days to display
    echo "<label for=\"nbjours\">Nombre de jours à afficher</label>";
    echo "<input type=\"number\" name=\"nbjours\" id=\"nbjours\" min=\"1\" max=\"30\" value=\"1\">";
    echo "<input type=\"submit\" value=\"Valider\">";
    echo "</form>";
    echo "</section>";  
} else {
    //if there is no sensor in the building, display an error message
    echo "<p class=\"erreur\">Aucun capteur dans ce batiment</p>";
}

//close the connection
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
    <p class="Validator">Validation HTML5</p> 
    <a href="#" target="_blank"><img class="validator" src="../media/htmllogo.png" alt="HTML 5 Valide"></a>
    <a href="#" target="_blank"><img class="validator" src="../media/csslogo.png" alt="CSS 3 Valide"></a>
   
</footer>

</body>

</html>






















