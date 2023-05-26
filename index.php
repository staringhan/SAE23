<!DOCTYPE html>
<html lang="fr">
 <head>
  <title>Accueil</title>
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
            <li><a class="current" href="#">Accueil</a></li>
            <li><a href="connexion.html">Connexion</a></li>
        </ul>
        
    </nav>
	</header>

<main>

<section class="TITRE">
    <h1>SAE 23</h1>
</section>
    
<section class="texte">
    <h3>Quel est l'objectif de ce site WEB ? </h3>
    <p>En tant que professionnels R&T, Ce site dynamique nous permet de recenser les données récupérées par différents capteurs présents dans les batiments de l'IUT de Blagnac. Ainsi, les administrateurs pourront être amenés à gérer et traiter ces données structurées. </p>
</section >

<section>
    <h3> Batiments </h3>
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
    
    </section>
    

</main>

<footer>
    
    <ul class="liste">
        <li>
            <a href="https://www.iut-blagnac.fr/fr/" target="_blank">Iut de Blagnac</a>
        </li>
        <li>
            <a href="https://www.iut-blagnac.fr/fr/formations/but-rt" target="_blank">Etudiant en R&T</a>
        </li>
        <li>
            <a href="mailto:daniel.halidi.iut@gmail.com">Contact</a>
        </li>
    </ul>

    
</footer>

</body>

</html>