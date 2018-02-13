<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
{
	if($_SESSION['Admin'] == 0){
		$error="1"; 
		header('Location: police.php?error='.$error);
	}else{
  $id = $_POST['deleteItem'];
  $count=$bdd->prepare("DELETE FROM lspd WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  $count->execute();
  header('Location: police.php');
}
};
};

?>
