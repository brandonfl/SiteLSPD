<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
if(isset($_POST['allowItem']) and is_numeric($_POST['allowItem']) and $_SESSION['Admin'] == 1 and isset($_GET['rang']))
{
		
  $id = $_POST['allowItem'];
  
  if($id == $_SESSION['id']){
     $error = 2;
    header('Location: administration.php?statut='.$error);
}else{
  $stat = $_GET['allowed'];
  $count=$bdd->prepare("UPDATE membres SET ". ."=0 WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  
  $count->execute();
  
header('Location: administration.php?statut='.$stat);

}};
};

?>
