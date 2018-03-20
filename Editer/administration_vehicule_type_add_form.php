<?php

// Calls for the config file
include( "config.php" );
session_start();

if($_SESSION['Admin']==1){


if(isset($_FILES['avatar'])) {
    $dossier = 'vehicule/';
    $fichier = basename(urlencode($_FILES['avatar']['name']));

    // Check if file already exists
    if (file_exists($dossier . $fichier)) {
        header('Location: administration_vehicule_type_add.php?statut=1');
    }else{
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {

        $type = urlencode($_FILES['avatar']['name']);
        $url = "https://lspd-fivelife.fr/". $dossier .$type." ";

        $typearray = explode(".",$type);
        $dbtype = $typearray[0];


        // Insert the information
        $req = $bdd->prepare('INSERT INTO type (nom,type,img) VALUES(?,?,?)');
        $req->execute(array($_POST['nom'],$dbtype,$url));

// Redirect user back to the add criminal page
        header('Location: administration_vehicule_type.php?statut=1');



    } else //Sinon (la fonction renvoie FALSE).
    {
        header('Location: administration_vehicule_type_add.php?statut=2');
    }
}
}
}else{
    header("Location: login.php");
}
?>