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
        <legend class="form">Choissisez le bâtiment que vous souhaitez ajouter</legend>
        <form action="#" method="post" enctype="multipart/form-data">
            <section class="batiment">
                
                    <input type="radio" id="A" name="bat_add" value="Batiment A" class="radio-input">
                    <label for="A" class="nomBAT">Batiment A</label><br>
                    <input type="radio" id="B" name="bat_add" value="Batiment B" class="radio-input">
                    <label for="B" class="nomBAT">Batiment B</label><br>
                    <input type="radio" id="C" name="bat_add" value="Batiment C" class="radio-input">
                    <label for="C" class="nomBAT">Batiment C</label><br>
                    <input type="radio" id="D" name="bat_add" value="Batiment D" class="radio-input">
                    <label for="D" class="nomBAT">Batiment D</label><br>
            </section>

        <section class="form">
                <label for="nom" class="texte">Nom du batiment</label><br>
                <input type="text" id="nom" name="nom" value=""><br>

                <label for="login" class="texte">Login</label><br>
                <input type="text" id="login" name="login" value=""><br>

                <label for="nom" class="texte">Password</label><br>
                <input type="text" id="mdp" name="mdp" value=""><br>
        </section>
            <section class="valid">
                <input type="submit" value="Valider" class="valider" />
            </section>
        </form>
    
    </section>


    <section class="admin">

        <form action="#" method="post" enctype="multipart/form-data">
            <fieldset class="batiment">
                <legend>Choissisez le bâtiment que vous souhaitez supprimer</legend>
    
                    <input type="radio" id="A" name="bat_add" value="Batiment A" class="radio-input">
                    <label for="A" class="nomBAT">Batiment A</label><br>
                    <input type="radio" id="B" name="bat_add" value="Batiment B" class="radio-input">
                    <label for="B" class="nomBAT">Batiment B</label><br>
                    <input type="radio" id="C" name="bat_add" value="Batiment C" class="radio-input">
                    <label for="C" class="nomBAT">Batiment C</label><br>
                    <input type="radio" id="D" name="bat_add" value="Batiment D" class="radio-input">
                    <label for="D" class="nomBAT">Batiment D</label><br>
            </fieldset>
            
                <label for="nom">Nom du batiment</label><br>
                <input type="text" id="nom" name="nom" value=""><br>

                <label for="login">Login</label><br>
                <input type="text" id="login" name="login" value=""><br>

                <label for="nom">Password</label><br>
                <input type="text" id="mdp" name="mdp" value=""><br>

            
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
            <legend>Choissisez le capteur que vous souhaitez ajouter</legend>
                <input type="radio" id="A" name="bat_add" value="Batiment A" class="radio-input">
                <label for="A" class="nomBAT">Batiment A</label><br>
                <input type="radio" id="B" name="bat_add" value="Batiment B" class="radio-input">
                <label for="B" class="nomBAT">Batiment B</label><br>
                <input type="radio" id="C" name="bat_add" value="Batiment C" class="radio-input">
                <label for="C" class="nomBAT">Batiment C</label><br>
                <input type="radio" id="D" name="bat_add" value="Batiment D" class="radio-input">
                <label for="D" class="nomBAT">Batiment D</label><br>
        </fieldset>

        <section class="valid">
            <input type="submit" value="Valider" />
        </section>
    </form>

</section>

<section class="admin">

    <form action="#" method="post" enctype="multipart/form-data">
        <fieldset class="batiment">
            <legend>Choissisez le capteur que vous souhaitez supprimer</legend>
                <input type="radio" id="A" name="bat_add" value="Batiment A" class="radio-input">
                <label for="A" class="nomBAT">Batiment A</label><br>
                <input type="radio" id="B" name="bat_add" value="Batiment B" class="radio-input">
                <label for="B" class="nomBAT">Batiment B</label><br>
                <input type="radio" id="C" name="bat_add" value="Batiment C" class="radio-input">
                <label for="C" class="nomBAT">Batiment C</label><br>
                <input type="radio" id="D" name="bat_add" value="Batiment D" class="radio-input">
                <label for="D" class="nomBAT">Batiment D</label><br>
        </fieldset>

        <section class="valid">
            <input type="submit" value="Valider" />
        </section>
    </form>

</section>


























