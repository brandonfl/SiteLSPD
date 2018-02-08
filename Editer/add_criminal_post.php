<?php
// Calls for the config file
include( "config.php" );



// Insert the information
$req = $bdd->prepare('INSERT INTO lspd (nom, telephone, crime, sanction) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['nom'], $_POST['telephone'], $_POST['crime'], $_POST['sanction']));

// Redirect user back to the add criminal page
header('Location: add_criminal.php');

?>
