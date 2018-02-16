<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
if(isset($_POST['prodId']) and is_numeric($_POST['prodId']) and $_SESSION['Admin'] == 1 and isset($_GET['rang']) and is_numeric($_GET['rang']))
{
		
  $id = $_POST['prodId'];
  
  if($id == $_SESSION['id']){
     $error = 2;
    header('Location: administration.php?statut='.$error);
}else{
  if($_GET['rang'] == 1) { //police
      $count=$bdd->prepare("UPDATE membres SET police=1,procureur=0,juge=0,concessionnaire=0,mecanicien=0 WHERE id=:id");
      $count->bindParam(":id",$id,PDO::PARAM_INT);

      $count->execute();

      header('Location: administration.php?statut=5');

  }

      if($_GET['rang'] == 2) { //procureur
          $count=$bdd->prepare("UPDATE membres SET police=0,procureur=1,juge=0,concessionnaire=0,mecanicien=0 WHERE id=:id");
          $count->bindParam(":id",$id,PDO::PARAM_INT);

          $count->execute();

          header('Location: administration.php?statut=5');

      }

      if($_GET['rang'] == 3) { //juge
          $count=$bdd->prepare("UPDATE membres SET police=0,procureur=0,juge=1,concessionnaire=0,mecanicien=0 WHERE id=:id");
          $count->bindParam(":id",$id,PDO::PARAM_INT);

          $count->execute();

          header('Location: administration.php?statut=5');

      }

      if($_GET['rang'] == 4) { //concessionnaire
          $count=$bdd->prepare("UPDATE membres SET police=0,procureur=0,juge=0,concessionnaire=1,mecanicien=0 WHERE id=:id");
          $count->bindParam(":id",$id,PDO::PARAM_INT);

          $count->execute();

          header('Location: administration.php?statut=5');

      }

      if($_GET['rang'] == 5) { //mecanicien
          $count=$bdd->prepare("UPDATE membres SET police=0,procureur=0,juge=0,concessionnaire=0,mecanicien=1 WHERE id=:id");
          $count->bindParam(":id",$id,PDO::PARAM_INT);

          $count->execute();

          header('Location: administration.php?statut=5');

      }

}};
};

?>
