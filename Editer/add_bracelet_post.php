<?php
// Calls for the config file
include( "config.php" );
session_start();
date_default_timezone_set('Europe/Paris'); //nous sommes en france ;)

if (isset($_SESSION['id'])) {
if($_SESSION['Admin'] == 0 and $_SESSION['procureur']==0 and $_SESSION['police']==0){
	$statut = 0;
	header( "Location: bracelet.php?statut=".$statut);	
	
}else{

    $now = time();
    $datenow = date("Y-m-d H:i:s", $now);

// Insert the information
$req = $bdd->prepare('INSERT INTO bracelet (debut,dernier,nom, telephone, fin,par) VALUES("'.$datenow.'","'.$datenow.'",?, ?, ?, ?)');
$req->execute(array($_POST['nom'], $_POST['telephone'], $_POST['date'],$_SESSION['pseudo']));

// Redirect user back to the add criminal page
header('Location: bracelet.php');
}} else {
    header("Location: login.php");
}
?>
