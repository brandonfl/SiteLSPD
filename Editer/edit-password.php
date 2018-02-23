<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and isset($_POST['password']) and isset($_POST['password_confirmation'])) {

$mdp1 = sha1($_POST['password']);
$mdp2 = sha1($_POST['password_confirmation']);


if ($mdp1==$mdp2){

	// Insert the information
$req = $bdd->prepare('UPDATE membres SET motdepasse="'.$mdp2.'" WHERE id='.$_SESSION['id'].' ');
$req->execute();

// Redirect user back to the add criminal page
header('Location: profil.php?error=0');

	}else{

		header('Location: profil.php?error=1');

	}


} else {
    header("Location: login.php");
}
?>
