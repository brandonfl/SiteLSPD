<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and $_SESSION['Admin'] == 1) {


// Insert the information
$req = $bdd->prepare('INSERT INTO annonce (nom,texte) VALUES(?,?)');
$req->execute(array($_POST['nom'], $_POST['texte']));

// Redirect user back to the add criminal page
header('Location: administration_annonce.php');
} else {
    header("Location: login.php");
};
?>
