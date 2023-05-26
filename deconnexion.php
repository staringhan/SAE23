<?php
//deconnexion from session and redirection to index.php
session_start();
session_destroy();
header('Location: index.php');
?>