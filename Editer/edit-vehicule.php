<?php
// Calls for the config file
include( "config.php" );
session_start();

if (isset($_SESSION['id']) and isset($_POST['id']) and isset($_POST['action']) and isset($_POST['for']) and isset($_POST['from']) and ($_SESSION['police']=1 or $_SESSION['Admin']= 1)) {


$reponse = $bdd->query('SELECT * FROM vehicule WHERE id ='.$_POST['id'].' ');

// Display each entry one by one
while ($data = $reponse->fetch()) {
	$assigne = $data['assigne'];
	break;

    }

    $allow = 0;

    if (isset($assigne)){
		if($assigne == 'All'){
				$allow = 1;
			}else{
				if ($_SESSION['Admin']==1){
					$allow = 1;
				}else{
					if($assigne == $_SESSION['pseudo']){
						$allow = 1;
						}else{
							$allow = 0;
						}
				}

			}

    	}else{
    	if ($_POST['from']=='Admin'){
    		header("Location: administration_vehicule.php?statut=3");
    	}else{
    		header("Location: vehicule.php?statut=3");
    		}

    	}

    	if($allow == 1){

    		$req = $bdd->prepare('UPDATE vehicule SET last= NOW() + INTERVAL 1 HOUR , par='.$_SESSION['pseudo'].', '.$_POST['for'].'='.$_POST['action'].' WHERE id='.$_POST['id'].' ');
			$req->execute();


		if ($_POST['from']=='Admin'){
    		header("Location: administration_vehicule.php?statut=4");
    	}else{
    		header("Location: vehicule.php?statut=4");
    		}


    	}else{
    	if ($_POST['from']=='Admin'){
    		header("Location: administration_vehicule.php?statut=3");
    	}else{
    		header("Location: vehicule.php?statut=3");
    		}
    	}

} else {
    header("Location: login.php");
}
?>
