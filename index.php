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
  <link rel="shortcut icon" href="./media/favicon.ico" type="image/x-icon">


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
            <li><a href="web/consultation.php">Consultation</a></li>
            <li><a href="web/gestionprojet.html">Projet</a></li>
            <li><a href="web/connexion.php">Connexion</a></li>
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
    <h3>Voici les bâtiments gérés </h3>
    <?php
    
    #basic html page with a table with 3 columns and n rows named "salle", "capteurs" and "valeurs"
    #connect to the database
    include 'web/connect.php';
    //make the request and fetch the data
    $sql = "SELECT `ID-bat`,`nom` FROM `batiment`";
    $result = mysqli_query($con, $sql);
    //display the data in a table
    if (mysqli_num_rows($result) > 0) 
    {
        echo "<table><tr><th>Batiment</th><th>id</th></tr>";
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
            echo "<tr><td>".$row["nom"]."</td><td>".$row["ID-bat"]."</td></tr>";
        }
        echo "</table>";

      
    }
    $con->close();
    ?>
    
    </section>
    

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
                <a href="web/mentionsleg.html">Mentions légales</a>
            </li>
        </ul>

<p class="copyright">BESSAIAH-BONVENT-GIRARD-HALIDI @ 2023</p>
    <p class="Validator">Languages utilisés</p> 
    <a href="#" target="_blank"><img class="validator" src="./media/htmllogo.png" alt="HTML 5 Valide"></a>
    <a href="#" target="_blank"><img class="validator" src="./media/csslogo.png" alt="CSS 3 Valide"></a>

    
</footer>

</body>

</html>