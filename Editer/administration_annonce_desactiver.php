<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
if(isset($_POST['allowItem']) and is_numeric($_POST['allowItem']) and $_SESSION['Admin'] == 1 )
{
		
  $id = $_POST['allowItem'];

  $count=$bdd->prepare("UPDATE annonce SET isActive=0 WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  
  $count->execute();
  
header('Location: administration_annonce.php?statut=2');

}};
?>
