<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id']) and (($_SESSION['PDG'] == 1 and ($_SESSION['mecanicien'] == 1 or $_SESSION['concessionnaire'] == 1)) or $_SESSION['Admin']==1) ) {

          if (isset($_POST['id']) and is_numeric($_POST['id']) and isset($_POST['rang'])) {

              $count = $bdd->prepare("UPDATE `membres` SET `allowed` = '1', `".$_POST['rang']."` = '1' WHERE `membres`.`id` =".$_POST['id']." ");


              $count->execute();


              $statut = "1";
              header('Location: pdg.php?statut=' . $statut);
          }

}else{
    header('Location: login.php');
}

?>
