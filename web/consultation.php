<!DOCTYPE html>
<html lang="fr">
 <head>
  <title>Page de Consultation</title>
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
            <li><a  href="../index.php">Accueil</a></li>
            <li><a class="current" href="#">Consultation</a></li>
            <li><a href="gestionprojet.html">Projet</a></li>
            <li><a href="connexion.php">Connexion</a></li>

        </ul>
        
    </nav>
	</header>

<main>

<section class="TITRE">
    <h1>Consultation</h1>
</section>


<?php
//connect to the database
include 'connect.php';

// for each building, create a section and display the last value of its sensors
$sql = "SELECT `ID-bat`,`nom` FROM `batiment`";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    //while there are buildings, display them
    while($row = mysqli_fetch_assoc($result)) {
        echo '<section class="texte">';
        echo '<h3>' .$row["nom"]. '</h3>';
        echo '<p>';
        //fetch the last value of each sensor in the building, in a table
        $IDbat = $row["ID-bat"];
        
        $sql2 = "SELECT `mesures`.`valeur`, `mesures`.`date`, `mesures`.`heure`, `mesures`.`Salle`, `capteurs`.`ID-cap`, `batiment`.`nom`, `batiment`.`ID-bat`, `mesures`.`type`
                FROM `mesures`
                LEFT JOIN `capteurs` ON `mesures`.`ID-cap` = `capteurs`.`ID-cap`
                LEFT JOIN `batiment` ON `capteurs`.`ID-bat` = `batiment`.`ID-bat`
                WHERE `capteurs`.`ID-bat` = \"$IDbat\"
                ORDER BY `mesures`.`date` DESC, `mesures`.`heure` DESC
                LIMIT 1";

        $result2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            while($row2 = mysqli_fetch_assoc($result2)) {
                echo '<table>';
                echo '<tr>';
                echo '<th>Salle</th>';
                echo '<th>Type</th>';
                echo '<th>Valeur</th>';
                echo '<th>Date</th>';
                echo '<th>Heure</th>';
                echo '</tr>';
                echo '<tr>';
                // dele te " " from the room name
                $row2["Salle"] = str_replace('"', "", $row2["Salle"]);
                echo "<td>" . $row2["Salle"] . "</td>";
                echo '<td>' .$row2["type"]. '</td>';
                echo '<td>' .$row2["valeur"]. '</td>';
                echo '<td>' .$row2["date"]. '</td>';
                echo '<td>' .$row2["heure"]. '</td>';
                echo '</tr>';
                echo '</table>';
            }
        }


        echo '</p>';
        echo '</section>';
    }
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
            <a href="mentionsleg.html">Mentions légales</a>
        </li>
    </ul>

<p class="copyright">BESSAIAH-BONVENT-GIRARD-HALIDI @ 2023</p>
    <p class="Validator">Validation HTML5</p> 
    <a href="#" target="_blank"><img class="validator" src="../media/htmllogo.png" alt="HTML 5 Valide"></a>
    <a href="#" target="_blank"><img class="validator" src="../media/csslogo.png" alt="CSS 3 Valide"></a>

    
</footer>

</body>

</html>