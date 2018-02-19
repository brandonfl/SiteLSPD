<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and  ($_SESSION['concessionnaire'] == 1 or $_SESSION['Admin'] == 1)) {

// Insert the information
    $req = $bdd->prepare('INSERT INTO plaque (plaque,proprietaire,modele,date,par) VALUES(?, ?, ?, NOW() + INTERVAL 1 HOUR,?)');
    $req->execute(array($_POST['plaque'], $_POST['nom'], $_POST['modele'],$_SESSION['pseudo']));


    $commentaire = 'Concessionnaire : nouveau vehicule';

    $req2 = $bdd->prepare('INSERT INTO controle (horodateur,plaque,nom,commentaire,fin,par) VALUES(NOW() + INTERVAL 1 HOUR,?,?,?,NOW() + INTERVAL 7 DAY,?)');
    $req2->execute(array($_POST['plaque'], $_POST['nom'], $commentaire,$_SESSION['pseudo']));

// Redirect user back to the add criminal page
    header('Location: concessionnaire.php?statut=1');
} else {
    header("Location: login.php");
}
?>
