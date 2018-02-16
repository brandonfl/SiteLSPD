<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
if(isset($_POST['prodId']) and is_numeric($_POST['prodId']) and $_SESSION['Admin'] == 1 and isset($_GET['rang']))
{
		
  $id = $_POST['prodId'];
  
  if($id == $_SESSION['id']){
     $error = 2;
    header('Location: administration.php?statut='.$error);
}else{
  $count=$bdd->prepare("UPDATE membres SET ".$_GET['rang']."=0 WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  
  $count->execute();
  
header('Location: administration.php?statut=4');

}};
};

?>
