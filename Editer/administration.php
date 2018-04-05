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
    $statut = $_GET['statut'];
}
session_start();





if (isset($_SESSION['id']) and $_SESSION['Admin'] == 1) {
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
                            <img src="assets/img/lspd.png" width=180 height=70/>
                        </a>
                    </div>
                    <div class="right-div">';
    if($_SESSION['Admin']==1){
        echo'<a href="administration.php" class="btn btn-info">ADMIN</a>';
    }else{
        if($_SESSION['PDG']==1){
            echo'<a href="pdg.php" class="btn btn-info">PDG</a>';
        }
    }

    echo'
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
                                    <li>
                                        <a href="police.php">Police</a>
                                    </li>
                                    <li>
										<a href="administration.php" class="menu-top-active">Administration</a>
									</li>
									<li>
										<a href="administration_annonce.php">Annonce</a>
									</li>
									<li>
										<a href="administration_vehicule.php">Véhicule</a>
									</li>
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
                            <h4 class="header-line">Admin PANEL</h4>
                        </div>
                    </div>
                    
                    
                 

                                    ';
    include("config.php");
    if (isset($statut)) {
        if($statut == 1){
    echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Un nouveau membre a été autorisé</div>
    
    ';}
    
    if($statut == 0){
    echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Un membre a été révoqué</div>
    
    ';}
    
    if($statut == 2){
    echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Vous ne pouvez pas vous editer vous même</div>
    
    ';}

        if($statut == 3){
            echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Vous ne pouvez pas editer un administrateur</div>
    
    ';}

        if($statut == 4){
            echo '
    <div class="alert alert-warning alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Un membre n\'ayant plus de droits ne pourra pas se connecter</div>
    
    ';}

        if($statut == 5){
            echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Les droits d\'un membre ont été modifiés</div>
    
    ';}

        if($statut == 6){
            echo '
    <div class="alert alert-warning alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Ce membre est banni</div>
    
    ';}

    
}


echo'
<div class="right-div">
                        <a href="administration.php" class="btn btn-info">Actualiser</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Allow</th>
                                                    <th>Pseudo</th>
                                                    <th>Mail</th>
                                                    <th>Police</th>
                                                    <th>Procureur</th>
                                                    <th>Juge</th>
                                                    <th>Concessionnaire</th>
                                                    <th>Mecanicien</th>
                                                    <th>PDG</th>
                                                    <th>Admin</th>
                                                    <th>Ban</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
';
    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM membres');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
        if($data['pseudo']=="All" or $data['pseudo']=="System"){
            continue;
        }
?>
                                               <tr class="odd gradeX">
                                                   
                                                     <?php
                                                     if($data['ban'] == 1){
                                                         echo '<form action="administration.php?statut=6" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-warnn" value="' . $data['id'] . '" />
                                                     </td></form>';
                                                     }else{
                                                     if($data['Admin'] == 1){
                                                         echo '<form action="administration.php?statut=3" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-default" value="' . $data['id'] . '" />
                                                     </td></form>';
                                                     }else{
                                                    if($data['allowed'] == 1){
                                                            echo '<form action="administration_form.php?allowed=0" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['id'] . '" />
                                                     </td></form>';
                                                        }else{
                                                        if($data['allowed'] == 0){
                                                            echo '<form action="administration_form.php?allowed=1" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['id'] . '" />
                                                     </td></form>';
                                                        }}}}
?>
                                                   <td>
                                                       <?php
                                                       echo $data['pseudo'];
                                                       ?>
                                                   </td>
                                                   <td>
                                                       <?php
                                                       echo $data['mail'];
                                                       ?>
                                                   </td>

                                                   <?php
                                                   if($data['ban'] == 1){
                                                       echo '<form action="administration.php?statut=6" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-warnn" value="' . $data['police'] . '" />
                                                     </td></form>';
                                                   }else{
                                                   if($data['Admin'] == 1){
                                                       echo '<form action="administration.php?statut=3" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-default" value="' . $data['police'] . '" />
                                                     </td></form>';
                                                   }else{
                                                       if($data['police'] == 1){
                                                           echo '<form action="administration_droit_desactiver.php?rang=police" method="post">
                                                                    <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['police'] . '" />
                                                     </td></form>';
                                                       }else{
                                                           if($data['police'] == 0){
                                                               echo '<form action="administration_droit_activer.php?rang=1" method="post">
                                                                        <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['police'] . '" />
                                                     </td></form>';
                                                           }}}}
                                                   ?>

                                                   <?php
                                                   if($data['ban'] == 1){
                                                       echo '<form action="administration.php?statut=6" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-warnn" value="' . $data['procureur'] . '" />
                                                     </td></form>';
                                                   }else{
                                                   if($data['Admin'] == 1){
                                                       echo '<form action="administration.php?statut=3" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-default" value="' . $data['procureur'] . '" />
                                                     </td></form>';
                                                   }else{
                                                       if($data['procureur'] == 1){
                                                           echo '<form action="administration_droit_desactiver.php?rang=procureur" method="post">
                                                                    <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['procureur'] . '" />
                                                     </td></form>';
                                                       }else{
                                                           if($data['procureur'] == 0){
                                                               echo '<form action="administration_droit_activer.php?rang=2" method="post">
                                                                        <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['procureur'] . '" />
                                                     </td></form>';
                                                           }}}}
                                                   ?>

                                                   <?php
                                                   if($data['ban'] == 1){
                                                       echo '<form action="administration.php?statut=6" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-warnn" value="' . $data['juge'] . '" />
                                                     </td></form>';
                                                   }else{
                                                   if($data['Admin'] == 1){
                                                       echo '<form action="administration.php?statut=3" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-default" value="' . $data['juge'] . '" />
                                                     </td></form>';
                                                   }else{
                                                       if($data['juge'] == 1){
                                                           echo '<form action="administration_droit_desactiver.php?rang=juge" method="post">
                                                                    <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['juge'] . '" />
                                                     </td></form>';
                                                       }else{
                                                           if($data['juge'] == 0){
                                                               echo '<form action="administration_droit_activer.php?rang=3" method="post">
                                                                        <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['juge'] . '" />
                                                     </td></form>';
                                                           }}}}
                                                   ?>

                                                   <?php
                                                   if($data['ban'] == 1){
                                                       echo '<form action="administration.php?statut=6" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-warnn" value="' . $data['concessionnaire'] . '" />
                                                     </td></form>';
                                                   }else{
                                                   if($data['Admin'] == 1){
                                                       echo '<form action="administration.php?statut=3" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-default" value="' . $data['concessionnaire'] . '" />
                                                     </td></form>';
                                                   }else{
                                                       if($data['concessionnaire'] == 1){
                                                           echo '<form action="administration_droit_desactiver.php?rang=concessionnaire" method="post">
                                                                    <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['concessionnaire'] . '" />
                                                     </td></form>';
                                                       }else{
                                                           if($data['concessionnaire'] == 0){
                                                               echo '<form action="administration_droit_activer.php?rang=4" method="post">
                                                                        <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['concessionnaire'] . '" />
                                                     </td></form>';
                                                           }}}}
                                                   ?>

                                                   <?php
                                                   if($data['ban'] == 1){
                                                       echo '<form action="administration.php?statut=6" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-warnn" value="' . $data['mecanicien'] . '" />
                                                     </td></form>';
                                                   }else{
                                                   if($data['Admin'] == 1){
                                                       echo '<form action="administration.php?statut=3" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-default" value="' . $data['mecanicien'] . '" />
                                                     </td></form>';
                                                   }else{
                                                       if($data['mecanicien'] == 1){
                                                           echo '<form action="administration_droit_desactiver.php?rang=mecanicien" method="post">
                                                                    <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['mecanicien'] . '" />
                                                     </td></form>';
                                                       }else{
                                                           if($data['mecanicien'] == 0){
                                                               echo '<form action="administration_droit_activer.php?rang=5" method="post">
                                                                        <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['mecanicien'] . '" />
                                                     </td></form>';
                                                           }}}}
                                                   ?>

                                                   <td class="center">
                                                       <?php
                                                       echo $data['PDG'];
                                                       ?>
                                                   </td>

                                                   <td class="center">
                                                        <?php
        echo $data['Admin'];
?>
                                                   </td>






                                                   <?php
                                                   if($data['Admin'] == 1){
                                                       echo '<form action="administration.php?statut=3" method="post">
        <td>
                                                             <input type="hidden" name="id" value="' . $data['id'] . '" />
                                                             <button type="submit" class="btn btn-default">
                                                                <span class="glyphicon glyphicon-remove-circle"></span>
                                                             </button>
                                                     </td></form>';
                                                   }else{
                                                       if($data['ban'] == 1){
                                                           echo '<form action="" method="post">
        <td>
                                                             <input type="hidden" name="id" value="' . $data['id'] . '" />
                                                             <button type="submit" class="btn btn-success">
                                                                <span class="glyphicon glyphicon-ok-circle"></span>
                                                             </button>
                                                     </td></form>';
                                                       }else{
                                                           if($data['ban'] == 0){
                                                               echo '<form action="" method="post">
        <td>
                                                             <input type="hidden" name="id" value="' . $data['id'] . '" />
                                                             <button type="submit" class="btn btn-danger">
                                                                <span class="glyphicon glyphicon-ban-circle"></span>
                                                             </button>
                                                     </td></form>';
                                                           }}}
                                                   ?>

                                                 
                                                </tr>

                                                <?php
    }
    $reponse->closeCursor(); // Complete query
    echo '

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--End Advanced Tables -->
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
             Coded by : Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}
?> </html>
