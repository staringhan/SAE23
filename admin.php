<?php
//check session to see if the user is connected as an administrator with the right login and password
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
        // sebd ab alert saying that the user is not connected and redirect to index.php;
        echo "<script>alert('Vous n\'êtes pas connecté en tant qu\'administrateur')</script>";
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
 <head>
  <title>Administration</title>
  <meta charset="utf-8">
  <meta name="author" content="Daniel Halidi">
  <meta name="description" content="SAE 23, Accueil">
  <meta name="keywords" content="HTML, CSS">
  <link rel="stylesheet" type="text/css" href="./styles/style23.css" media="screen">
  <meta content="width=device-width, initial-scale=1" name="viewport">
</head>

<body>
	<header>

		<label class="Name">SAE 23</label>
		<input class="side-menu" type="checkbox" id="side-menu">
        <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>	
		
	<nav> 
        

        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="consultation.html">Consultation</a></li>
            <li><a  class ="current" href="#">Admin</a></li>

            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
        
    </nav>
	</header>

<main>


    <h2 class="hautpage">Administration des batiments</h2>

<section class="admin">

    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset class="batiment">
            <legend>Choissisez le bâtiment que vous souhaitez ajouter</legend>
        </fieldset>

        <section class="valid">
            <input type="submit" value="Valider" />
        </section>
    </form>

</section>



<section class="admin">

    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset class="batiment">
            <legend>Choissisez le bâtiment que vous souhaitez supprimer</legend>
        </fieldset>

        <section class="valid">
            <input type="submit" value="Valider" />
        </section>
    </form>

</section>


<section class="TITREBAS">
    <h2>Administration des capteurs</h2>
</section>


<section class="admin">

    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset class="batiment">
            <legend>Choissisez le bâtiment que vous souhaitez ajouter</legend>
        </fieldset>

        <section class="valid">
            <input type="submit" value="Valider" />
        </section>
    </form>

</section>

<section class="admin">

    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset class="batiment">
            <legend>Choissisez le bâtiment que vous souhaitez supprimer</legend>
        </fieldset>

        <section class="valid">
            <input type="submit" value="Valider" />
        </section>
    </form>

</section>


























