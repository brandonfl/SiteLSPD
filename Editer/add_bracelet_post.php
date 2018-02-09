<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id'])) {
if($_SESSION['Admin'] == 0 and $_SESSION['procureur']==0){
	$statut = 0;
	header( "Location: bracelet.php?statut=".$statut);	
	
}else{
// Insert the information
$req = $bdd->prepare('INSERT INTO bracelet (debut,dernier,nom, telephone, fin,par) VALUES(NOW() + INTERVAL 1 HOUR,NOW() + INTERVAL 1 HOUR,?, ?, ?, ?)');
$req->execute(array($_POST['nom'], $_POST['telephone'], $_POST['date'],$_SESSION['pseudo']));

// Redirect user back to the add criminal page
header('Location: bracelet.php');
}} else {
    header("Location: login.php");
}
?>
