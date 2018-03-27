<?php
include( "config.php" );
session_start();
if (isset($_SESSION['id']) and (($_SESSION['PDG'] == 1 and ($_SESSION['mecanicien'] == 1 or $_SESSION['concessionnaire'] == 1)) or $_SESSION['Admin']==1) ) {

          if (isset($_POST['id']) and is_numeric($_POST['id']) and isset($_POST['rang'])) {

              $count = $bdd->prepare("UPDATE `membres` SET `allowed` = '0', `police` = '0', `procureur` = '0', `juge` = '0', `concessionnaire` = '0', `mecanicien` = '0', `PDG` = '0' WHERE `membres`.`id` = ".$_POST['id']." ");


              $count->execute();

              
              $statut = "0";
              header('Location: pdg.php?statut=' . $statut);
          }

}else{
    header('Location: login.php');
}

?>
