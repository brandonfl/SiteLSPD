<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['juge'] == 1) {
        header('Location: bracelet.php?statut=3');
    } else {
      if ($_SESSION['police'] == 1 or $_SESSION['procurreur'] == 1 or $_SESSION['Admin'] == 1) {
          if (isset($_POST['updateItem']) and is_numeric($_POST['updateItem'])) {

              $id = $_POST['updateItem'];
              $count = $bdd->prepare("UPDATE bracelet SET dernier= NOW() + INTERVAL 1 HOUR , par=:par WHERE bracelet.id=:id");
              $count->bindParam(":par", $_SESSION['pseudo'], PDO::PARAM_STR);
              $count->bindParam(":id", $id, PDO::PARAM_INT);

              $count->execute();

              $statut = "2";
              header('Location: bracelet.php?statut=' . $statut);

          };
      } else {
        header('Location: login.php');
      }
    };
}else{
    header('Location: login.php');
}

?>
