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
            <li><a href="consultation.php">Consultation</a></li>
            <li><a  class ="current" href="#">Admin</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
        
    </nav>
	</header>

<main>

<section class="parentG">
    <h2 class="hautpage">Administration des batiments</h2>

    <section class="admin">
        <legend class="form">Choissisez le bâtiment que vous souhaitez ajouter</legend>
        <form action="./scripts_php/ajout_batiments.php" method="post" enctype="multipart/form-data" >
            <section class="batiment">
                
                <select id="ID_bat" name="ID_bat">
                    <option value="A">Batiment A</option>
                    <option value="B">Batiment B</option>
                    <option value="C">Batiment C</option>
                    <option value="D">Batiment D</option>
                    <option value="E">Batiment E</option>
                  </select>
            </section>

        <section class="form">

                
                <input type="text" id="nom" name="nom" placeholder="Nom du batiment"><br>

                
                <input type="text" id="login" name="login" placeholder="Login"><br>

                
                <input type="text" id="mdp" name="mdp" placeholder="Password"><br>
        </section>
            <section class="valid">
                <input type="submit" value="Valider" class="valider" />
            </section>
        </form>
    
    </section>


    <section class="admin">
        <legend class="form">Choissisez le bâtiment que vous souhaitez supprimer</legend>
        <form action="./scripts_php/suppr_batiments.php" method="post" enctype="multipart/form-data">
            <section class="batiment">
                
            <?php
                //connect to the database
                include 'connect.php';
                //get the list of the list of existing buildings
                $sql = "SELECT * FROM batiment";
                $result = mysqli_query($con, $sql);

                //display the list of the buildings
                echo "<select id='ID_bat' name='ID_bat'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    //print building name
                    echo "<option value='" . $row['ID-bat'] . "'>" . $row['nom'] . "</option>";
                }
                echo "</select>";



                ?>
            </section>

            <section class="valid">
                <input type="submit" value="Valider" class="valider" />
            </section>
        </form>
    
    </section>
</section>

<section class="parentD">


    <h2 class="hautpage">Administration des capteurs</h2>



<section class="admin">

    <form action="./scripts_php/ajout_capteur.php" method="post" enctype="multipart/form-data">
        
            
        <legend class="form">Choissisez le capteur que vous souhaitez ajouter</legend>

        <section class="batiment">
                
            <select id="ID_bat" name="batiment">
                <option value="A">Batiment A</option>
                <option value="B">Batiment B</option>
                <option value="C">Batiment C</option>
                <option value="D">Batiment D</option>
                <option value="E">Batiment E</option>
              </select>
        </section>

        <section class="form">

            <input type="text" id="nom" name="login" placeholder="Nom"><br>

            <input type="text" id="ID-cap" name="nom" placeholder="ID capteur"><br>

            
     
        </section>

            <section class="valid">
                <input type="submit" value="Valider" class="valider" />
            </section>

        </form>
</section>

<section class="admin">

    <form action="./scripts_php/suppr_capteur.php" method="post" enctype="multipart/form-data">
        
            <legend class="form">Choissisez le capteur que vous souhaitez supprimer</legend>
            <section class="batiment">
                <?php
                //connect to the database
                include 'connect.php';
                //get the list of the sensors
                $sql = "SELECT * FROM capteurs";
                $result = mysqli_query($con, $sql);
            
                //display the list of the sensors
                echo "<select id='ID_cap' name='ID_cap'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    //prin sensor name
                    echo "<option value='" . $row['ID-cap'] . "'>" . $row['nom'] . "</option>";
                }
                echo "</select>";



                ?>
            </section>

        <section class="valid">
            <input type="submit" value="Valider" class="valider" />
        </section>
    </form>

</section>
</section>


</body>

</html>






















