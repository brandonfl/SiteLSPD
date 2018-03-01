<?php
include('template.php');

if( isset($_POST['password']) and isset($_POST['plaque']) and isset($_POST['nom']) and isset($_POST['modele'])){
	//Si toutes les données sont saisie par le client

    //Et si le mot de passe est le bon
    if($_POST['password'] == $password){
    $boolean1 = false;
    $boolean2 = false;
    $pseudo = "System";

    $req = $bdd->prepare('INSERT INTO plaque (plaque,proprietaire,modele,date,par) VALUES(?, ?, ?, NOW() + INTERVAL 1 HOUR,?)');
    $boolean1 = $req->execute(array($_POST['plaque'], $_POST['nom'], $_POST['modele'],$pseudo));


    $commentaire = 'System : nouveau vehicule';

    $req2 = $bdd->prepare('INSERT INTO controle (horodateur,plaque,nom,commentaire,fin,par) VALUES(NOW() + INTERVAL 1 HOUR,?,?,?,NOW() + INTERVAL 30 DAY,?)');
    $boolean2 = $req2->execute(array($_POST['plaque'], $_POST['nom'], $commentaire,$pseudo));


	if( $boolean1 and $boolean2 ){
		$success = true;
		$msg = 'Le vol a bien été ajouté';
	} else {
		$msg = "Une erreur s'est produite";
	}
     }else {
        $msg = "Le mot de passe est incorrect";
}
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);