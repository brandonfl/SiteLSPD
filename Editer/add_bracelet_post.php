<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id'])) {

// Insert the information
$req = $bdd->prepare('INSERT INTO bracelet (nom, telephone, fin,par) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['nom'], $_POST['telephone'], $_POST['date'],$_SESSION['pseudo']));

// Redirect user back to the add criminal page
header('Location: bracelet.php');
} else {
    header("Location: login.php");
}
?>
