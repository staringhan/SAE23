<?php
//check session to see if the user is connected as an administrator with the right login and password
session_start();
if (!isset($_SESSION['gestionnaire']) || $_SESSION['gestionnaire'] !== true) {
    // sebd ab alert saying that the user is not connected and redirect to index.php;
    echo "<script>alert('Vous n\'êtes pas connecté en tant que gestionnaire')</script>";
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>SAE 23</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <label class="Name">SAE 23</label>
    <input class="side-menu" type="checkbox" id="side-menu">
    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>

    <nav>
        <ul>
            <li><a class="current" href="admin.php">Accueil</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </nav>
</header>
</html>