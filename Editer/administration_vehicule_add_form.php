<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and  $_SESSION['Admin'] == 1) {

// Insert the information
$req = $bdd->prepare('INSERT INTO vehicule (plaque,type,assigne) VALUES(?,?,?)');
$req->execute(array($_POST['plaque'], $_POST['type'], $_POST['pseudo']));

// Redirect user back to the add criminal page
header('Location: administration_vehicule.php?statut=1');
} else {
    header("Location: login.php");
}
?>
