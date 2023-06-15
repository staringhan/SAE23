<!DOCTYPE html>
<html lang="fr">
<?php
//verification of the existing connection, if the user is already connected, redirect to admin.php or gestionnaire.php depending on the user type
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
  header('Location: admin.php');
}
if (isset($_SESSION['gestionnaire']) && $_SESSION['gestionnaire'] === true) {
  header('Location: gestionnaire.php');
}


?>
<head>
  <meta charset="utf-8">
  <title>Page de connexion</title>
  <meta name="author" content="Daniel Halidi">
  <meta name="description" content="SAE 23, Accueil">
  <meta name="keywords" content="HTML, CSS">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link rel="stylesheet" type="text/css" href="../styles/style23.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../styles/login.css" media="screen">
  <link rel="shortcut icon" href="../media/favicon.ico" type="image/x-icon">
</head>

<body>

  <header>

    <label class="Name">SAE 23</label>
    <input class="side-menu" type="checkbox" id="side-menu">
    <label class="hamb" for="side-menu"><span class="hamb-line"></span></label> 

    <nav> 
      <ul>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="./consultation.php">Consultation</a></li>
        <li><a class="current" href="#">Connexion</a></li>

      </ul>
    </nav>

  </header>
  <section class="wrapper">
    <section id="formContenu">
      <h2 class="active">Se connecter</h2>

      <section class="image">
        <img src="../media/database.svg" id="icon" alt="User Icon">
      </section>

      <form action="login.php" method="post">
        <input type="text" id="login" name="login" placeholder="Identifiant">
        <input type="password" id="password" name="password" placeholder="Mot de passe">
        <input type="submit" class="submit" value="Connexion">
      </form>

    </section>
  </section>
  
</body>

</html>
