<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id'])) {

// Insert the information
$req = $bdd->prepare('INSERT INTO lspd (nom, telephone, crime, sanction,Agent) VALUES(?, ?, ?, ?,?)');
$req->execute(array($_POST['nom'], $_POST['telephone'], $_POST['crime'], $_POST['sanction'],$_SESSION['pseudo']));

// Redirect user back to the add criminal page
header('Location: add_criminal.php');
} else {
    header("Location: login.php");
}
?>
