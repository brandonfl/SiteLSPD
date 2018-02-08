<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
{
	if($_SESSION['Admin'] == 0 and $_SESSION['procureur'] == 0){
		$statut="1"; 
		header('Location: bracelet.php?statut='.$statut);
	}else{
  $id = $_POST['deleteItem'];
  $count=$bdd->prepare("DELETE FROM bracelet WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  $count->execute();
  header('Location: index.php');
}
};
};

?>
