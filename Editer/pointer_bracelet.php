<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
if(isset($_POST['updateItem']) and is_numeric($_POST['updateItem']))
{
		
  $id = $_POST['updateItem'];
  $count=$bdd->prepare("UPDATE bracelet SET dernier= NOW() + INTERVAL 1 HOUR , par=:par WHERE bracelet.id=:id");
  $count->bindParam(":par",$_SESSION['pseudo'], PDO::PARAM_STR);
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  
  $count->execute();
  
  $statut="2"; 
header('Location: bracelet.php?statut='.$statut);

};
};

?>
