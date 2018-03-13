<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and  ($_SESSION['mecanicien'] == 1 or $_SESSION['Admin'] == 1)) {

    $upplaque = strtoupper($_POST['plaque']);

    if($_POST['nb']==0){
        $pseudo = "mecanicien : ".$_SESSION['pseudo'] ." ";
        $req2 = $bdd->prepare('INSERT INTO plaque (plaque,proprietaire,modele,date,par) VALUES(?, ?, ?, NOW() + INTERVAL 1 HOUR,?)');
        $boolean=$req2->execute(array($upplaque, $_POST['nom'], $_POST['modele'],$pseudo));

    }else{
        $boolean=true;

    }

    if($boolean) {
// Insert the information
        $req = $bdd->prepare('INSERT INTO controle (horodateur,plaque,nom,commentaire,fin,par) VALUES(NOW() + INTERVAL 1 HOUR,?,?,?,?,?)');
        $req->execute(array($upplaque, $_POST['nom'], $_POST['commentaire'], $_POST['date'], $_SESSION['pseudo']));

// Redirect user back to the add criminal page
        header('Location: mecanicien.php?statut=1');
    }else{
        header("Location: mecanicien.php?statut=2");
    }
} else {
    header("Location: login.php");
}
?>
