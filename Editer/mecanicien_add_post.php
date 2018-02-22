<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and  ($_SESSION['mecanicien'] == 1 or $_SESSION['Admin'] == 1)) {

// Insert the information
$req = $bdd->prepare('INSERT INTO controle (horodateur,plaque,nom,commentaire,fin,par) VALUES(NOW() + INTERVAL 1 HOUR,?,?,?,?,?)');
$req->execute(array($_POST['plaque'], $_POST['nom'], $_POST['commentaire'], $_POST['date'],$_SESSION['pseudo']));

// Redirect user back to the add criminal page
header('Location: mecanicien.php?statut=1');
} else {
    header("Location: login.php");
}
?>
