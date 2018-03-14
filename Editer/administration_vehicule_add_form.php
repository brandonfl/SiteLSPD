<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and  $_SESSION['Admin'] == 1) {

    $type=null;

    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM vehicule WHERE plaque='.$_POST['plaque'].' ');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
        $type = data['type'];
        break;
    }
    $reponse->closeCursor(); // Complete query

    if($type==null or $type==$_POST['type']) {

// Insert the information
        $req = $bdd->prepare('INSERT INTO vehicule (plaque,type,assigne) VALUES(?,?,?)');
        $req->execute(array($_POST['plaque'], $_POST['type'], $_POST['pseudo']));

// Redirect user back to the add criminal page
        header('Location: administration_vehicule.php?statut=1');
    }else{
        header('Location: administration_vehicule.php?statut=5');
    }
} else {
    header("Location: login.php");
}
?>
