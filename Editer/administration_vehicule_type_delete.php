<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id']) and isset($_POST['deleteItem']) and is_numeric($_POST['deleteItem']) and $_SESSION['Admin']==1) {


  $id = $_POST['deleteItem'];

  if($id>11) {

      $boolean = false;

      $count = $bdd->prepare("DELETE FROM vehicule WHERE type IN (SELECT type FROM type WHERE id=:id)");
      $count->bindParam(":id", $id, PDO::PARAM_INT);
      $boolean = $count->execute();


      if($boolean) {
          $reponse = $bdd->query('SELECT * FROM type WHERE id='.$id.' ');

          // Display each entry one by one
          while ($data = $reponse->fetch()) {
              $img = $data['img'];
          }
          $reponse->closeCursor(); // Complete query

          if(isset($img) and is_string($img)){
              $table = explode("/",$img);
              $todelete = $table[4];


              unlink('vehicule/'.$todelete);



              $count2 = $bdd->prepare("DELETE FROM type WHERE id=:id");
              $count2->bindParam(":id", $id, PDO::PARAM_INT);
              $count2->execute();


          }




      }


  }

    header('Location: administration_vehicule_type.php?statut=2');


}else{
    header('Location: login.php');
}

?>
