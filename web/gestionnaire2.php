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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <h2 class="hautpage">Gestion des bâtiments</h2>

    <?php
    include 'connect.php';

    // Get the building id of the user (replace with your session handling code)
    $IDbat = $_SESSION['ID-bat']; // Replace with your session retrieval code

    // Print ID-bat
    echo "<h3>Vous êtes connecté en tant que gestionnaire du bâtiment: $IDbat</h3>";

    // Get the distinct types of data for the building
    $sql_types = "SELECT DISTINCT `type` FROM `mesures`,`capteurs`,`batiment` 
    WHERE `mesures`.`ID-cap` = `capteurs`.`ID-cap` 
    AND `capteurs`.`ID-bat` = `batiment`.`ID-bat` 
    AND `batiment`.`ID-bat` = ?
    ORDER BY `type` ASC";
    
    // Prepare and execute the statement
    $stmt = mysqli_prepare($con, $sql_types);
    mysqli_stmt_bind_param($stmt, "s", $IDbat);
    mysqli_stmt_execute($stmt);
    
    // Get the result
    $result_types = mysqli_stmt_get_result($stmt);

    // Iterate over the types of data
    while ($row_types = mysqli_fetch_assoc($result_types)) {
        $type = $row_types['type'];

        // Fetch the data for the current type from the database
        $sql = "SELECT `heure`, `valeur`, `type`
                FROM `mesures`, `batiment`, `capteurs`
                WHERE `capteurs`.`ID-bat` = `batiment`.`ID-bat`
                AND `mesures`.`ID-cap` = `capteurs`.`ID-cap`
                AND `batiment`.`ID-bat` = ?
                AND `type` = ?
                ORDER BY `ID-mes` ASC
                LIMIT 24";

        // Prepare and execute the statement
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $IDbat, $type);
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Store the data in an array
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = array(
                'heure' => $row['heure'],
                'valeur' => $row['valeur']
            );
        }

        // Convert the data to JSON format
        $dataJson = json_encode($data);

        // Generate a unique ID for the chart canvas
        $chartId = 'myChart' . uniqid();

        // Output the chart container
        echo "<section>";
        echo "<canvas id='$chartId' class=chart-canvas></canvas>";
        echo "</section>";

        // Generate the JavaScript code for the current chart
        echo "<script>";
        echo "var data_$chartId = $dataJson;";
        echo "var heures_$chartId = data_$chartId.map(function(item) { return item.heure; });";
        echo "var valeurs_$chartId = data_$chartId.map(function(item) { return item.valeur; });";
        echo "var ctx_$chartId = document.getElementById('$chartId').getContext('2d');";
        echo "var chart_$chartId = new Chart(ctx_$chartId, {";
        echo "    type: 'line',";
        echo "    data: {";
        echo "        labels: heures_$chartId,";
        echo "        datasets: [{";
        echo "            label: '$type',";
        echo "            data: valeurs_$chartId,";
        echo "            borderColor: 'rgb(75, 192, 192)',";
        echo "            fill: false";
        echo "        }]";
        echo "    },";
        echo "    options: {";
        echo "        responsive: true,";
        echo "        scales: {";
        echo "            x: {";
        echo "                display: true,";
        echo "                title: {";
        echo "                    display: true,";
        echo "                    text: 'Heure'";
        echo "                }";
        echo "            },";
        echo "            y: {";
        echo "                display: true,";
        echo "                title: {";
        echo "                    display: true,";
        echo "                    text: 'Valeur'";
        echo "                }";
        echo "            }";
        echo "        }";
        echo "    }";
        echo "});";
        echo "</script>";
    }

    // Close the database connection
    mysqli_close($con);
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






















