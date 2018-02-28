<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
            <title>LSPD PANEL</title>
            <!-- BOOTSTRAP CORE STYLE  -->
            <link href="assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FONT AWESOME STYLE  -->
            <link href="assets/css/font-awesome.css" rel="stylesheet" />
            <!-- CUSTOM STYLE  -->
            <link href="assets/css/style.css" rel="stylesheet" /> 
            <!-- GOOGLE FONT -->
            <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        </head>
        <?php
if (isset($_GET['statut'])) {
    $error = $_GET['statut'];
}
session_start();
include("config.php");





if (isset($_SESSION['id']) and  ($_SESSION['police'] == 1 or $_SESSION['Admin'] == 1)) {

        $nav = '                    <li>
                                        <a href="police.php">Home</a>
                                    </li>
                                    <li>
										<a href="add_criminal.php">Ajouter un criminel</a>
									</li>
									<li>
										<a href="bracelet.php">Bracelet</a>
									</li>
									<li>
											<a href="concessionnaire.php">Plaques</a>
										</li>
										<li>
										<a href="vehicule.php" class="menu-top-active">Vehicule</a>
									</li>
										<li>
											<a href="trello" target="_blank">Informations Internes</a>
										</li>
										<li>
											<a href="drive" target="_blank">Documents</a>
										</li>';


    echo '
    <head>
    <link rel="icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" /><![endif]-->
    </head>

        <body>
            <div class="navbar navbar-inverse set-radius-zero" >
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="police.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>
                    </div>
                    <div class="right-div">
                        <a href="profil.php" class="btn btn-info">PROFIL</a>
                        <a href="logout.php" class="btn btn-danger">DECONNEXION</a>
                    </div>
                </div>
            </div>
            <!-- LOGO HEADER END-->
            <section class="menu-section">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="navbar-collapse collapse ">
                                <ul id="menu-top" class="nav navbar-nav navbar-right">
                                    '. $nav .'
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- MENU SECTION END-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">VEHICULES</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">';

    echo '
    <div class="alert alert-warning alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>En cours de developpement ...</strong></div>
    
    ';

    
    if (isset($error)) {
        if($error == 1){
    echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Uniquement les agents avec un haut niveau d\'habilitation peuvent effacer un casier judiciaire  </div>
    
    ';}
    
    if($error == 2){
    echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Uniquement les agents de la LSPD peuvent ajouter un casier judiciaire et non le procureur</div>
    
    ';
    }
        if($error == 3){
            echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error !</strong> Une erreur c\'est produite, merci de bien vouloir contacter un administrateur</div>
    
    ';}
        if($error == 4){
            echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Le statut d\'un vehicule a bien été modifié</div>
    
    ';}

    }

    echo '              
                </div>
                
                <!--specific vehicule-->
                </div>
                <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >Mes véhicules</h4></div>
                      ';


    $nombreme = 0;
    $nbme = $bdd->query('SELECT COUNT(*) AS nb FROM vehicule WHERE assigne="'.$_SESSION['pseudo'].'" ');
    while ($data = $nbme->fetch()) {
        $nombreme = $data['nb'];
    }
    $nbme->closeCursor(); // Complete query

    if($nombreme == 0){
        echo '
                       <div class="panel-body">
                          <div class="col-sm-5 col-xs-6 tital " >Aucun vehicule disponible</div>
                      </div>';

    }else{

        $me = $bdd->query('SELECT * FROM vehicule WHERE assigne="'.$_SESSION['pseudo'].'" ');
        while ($data = $me->fetch()) {


            $nomvehicule = null;
            $img = null;
            $nom = $bdd->query('SELECT * FROM type WHERE type="'.$data['type'].'" ');
            while ($nomdata = $nom->fetch()) {
                $nomvehicule = $nomdata['nom'];
                $img = $nomdata['img'];
            }
            $nom->closeCursor(); // Complete query


            echo '
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="Vehicule Pic" src="'.$img.'" class="img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2>'.$nomvehicule.'</h2>
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><strong>Plaque : '.$data['plaque'].'</strong></li>
                            <li>Assigné à : '.$data['assigne'].'</li>';

            if($data['sorti']==1){
                echo '<li>Sorti : Oui</li>';
            }else{
                echo '<li>Sorti : Non</li>';
            }

            if($data['perdu']==1){
                echo '<li>Perdu : Oui</li>';
            }else{
                echo '<li>Perdu : Non</li>';
            }

            echo'
                            <li>Dernière modification : '.$data['last'].'</li>
                            <li>Fait par : '.$data['par'].'</li>
                          </ul>
                          <hr>
                          <a href="" class="btn btn-danger">SORTIR</a>
                            <a href="" class="btn btn-warning">PERDU</a>
                      </div>
                      <hr> </div>';


        }
        $me->closeCursor(); // Complete query


    }



    echo'
        </div>
                        
                            <!-- Advanced Tables -->
                            <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >Véhicules disponibles à tous</h4></div>';

    echo '
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="Vehicule Pic" src="https://lspd-fivelife.fr/vehicule/police-cruiser.jpg" class="img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2>Police Cruiser</h2>
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><strong>Plaque : XXXXXXX</strong></li>
                            <li>Sorti : Non</li>
                            <li>Perdu : Non</li>
                            <li>Last : 2018-02_26 10:30:00</li>
                            <li>Agent : Glen McMahon</li>
                          </ul>
                          <hr>
                          <a href="" class="btn btn-danger">SORTIR</a>
                            <a href="" class="btn btn-warning">PERDU</a>
                      </div>
                      <hr> </div>';

    echo '
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="Vehicule Pic" src="https://lspd-fivelife.fr/vehicule/police-bike.jpg" class="img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2>Police Bike</h2>
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                          <li><strong>Plaque : XXXXXXX</strong></li>
                            <li>Sorti : Oui</li>
                            <li>Perdu : Non</li>
                            <li>Last : 2018-02_26 11:00:00</li>
                            <li>Agent : Glen McMahon</li>
                          </ul>
                          <hr>
                          <a href="" class="btn btn-success">RENTRER</a>
                            <a href="" class="btn btn-warning">PERDU</a>
                      </div>
                      <hr></div> ';


    echo '
                            </div>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                </div>
                <!-- /. ROW  -->
            </div>
            <!-- /. ROW  -->
            <!-- End  Hover Rows  -->
        </div>
        <div class="col-md-6">
            <!--    Context Classes  -->
            <!--  end  Context Classes  -->
        </div>
    </div>
    <!-- /. ROW  -->
</div> </div> <!-- CONTENT-WRAPPER SECTION END--> <section class="footer-section">
<div class="container">
    <div class="row">
        <div class="col-md-12">
                   &copy; 2017 LSPD |
             Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}
?> </html>
