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
  <link rel="stylesheet" type="text/css" href="./styles/style23.css" media="screen">
  <link rel="stylesheet" type="text/css" href="./styles/tableau.css" media="screen">
  <meta content="width=device-width, initial-scale=1" name="viewport">
</head>

<body>
	<header>

		<label class="Name">SAE 23</label>
		<input class="side-menu" type="checkbox" id="side-menu">
        <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>	
		
	<nav> 
        

        <ul>
            <li><a href="index.html">Accueil</a></li>
            <li><a href="consultation.html">Consultation</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
            <li><a href="administration.html">Admin</a></li>
            <li><a class="current" href="#">Gestion</a></li>
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

//history of the building sensors

$sql="SELECT `mesures`.`valeur`, `mesures`.`date`, `mesures`.`heure`, `mesures`.`Salle`, `capteurs`.`ID-cap`, `batiment`.`nom`, `batiment`.`ID-bat`, `mesures`.`type`
FROM `mesures`
LEFT JOIN `capteurs` ON `mesures`.`ID-cap` = `capteurs`.`ID-cap`
LEFT JOIN `batiment` ON `capteurs`.`ID-bat` = `batiment`.`ID-bat`
WHERE `capteurs`.`ID-bat` = \"$IDbat\"
ORDER BY `mesures`.`date` DESC, `mesures`.`heure` DESC
LIMIT 30";
echo '<section class="tableau">';
$result = mysqli_query($con, $sql);
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
        echo "<td>" . $row["Salle"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["valeur"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class=\"erreur\">Aucune donnée</p>";
}
echo '</section>';


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
    <a href="#" target="_blank"><img class="validator" src="./media/htmllogo.png" alt="HTML 5 Valide"></a>
    <a href="#" target="_blank"><img class="validator" src="./media/csslogo.png" alt="CSS 3 Valide"></a>
   
</footer>

</body>

</html>






















