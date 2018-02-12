<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id']) and $_SESSION['Admin'] == 1 ) {
if(isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']))
{
  $id = $_POST['deleteItem'];
  $count=$bdd->prepare("DELETE FROM annonce WHERE id=:id");
  $count->bindParam(":id",$id,PDO::PARAM_INT);
  $count->execute();
  header('Location: administration_annonce.php?statut=1');
}
};

?>
