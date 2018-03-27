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





if (isset($_SESSION['id']) and (($_SESSION['PDG'] == 1 and ($_SESSION['mecanicien'] == 1 or $_SESSION['concessionnaire'] == 1)) or $_SESSION['Admin']==1) ) {


        if($_SESSION['mecanicien'] == 1){
            $rang = 'mecanicien';

            $nav = '                    <li>
                                        <a href="mecanicien.php">Home</a>
                                    </li>
									<li>
										<a href="mecanicien_add.php">Ajouter un controle technique</a>
									</li>
										<li>
											<a href="serveur" target="_blank">Ville</a>
										</li>';

            $logo = '<a class="navbar-brand" href="mecanicien.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>';

        }else{
        if($_SESSION['concessionnaire'] == 1){
            $rang = 'concessionnaire';

            $nav = '                    <li>
                                        <a href="concessionnaire.php">Home</a>
                                    </li>
									<li>
										<a href="concessionnaire_add.php">Ajouter une plaque</a>
									</li>
									<li>
										<a href="plaque.php">Rechercher une plaque</a>
									</li>
										<li>
											<a href="serveur" target="_blank">Ville</a>
										</li>';

            $logo = '<a class="navbar-brand" href="concessionnaire.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>';
        }
        }


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
                        '.$logo.'
                    </div>
                    <div class="right-div">';
    if($_SESSION['Admin']==1){
        echo'<a href="administration.php" class="btn btn-info">ADMIN</a>';
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
                                    '.$nav.'
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="panel panel-info">
            <div class="panel-heading">
					<p></p>
					<p></p>Ajouter un '.$rang.'
					<p></p>
					<p></p>
				</div>
				</div>
            <!-- MENU SECTION END-->
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">PDG PANEL</h4>
                        </div>
                        </div>
                    
                           

                                    ';
    include("config.php");
    if (isset($statut)) {
        if($statut == 1){
    echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Un nouveau membre a été recruté</div>
    
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

    
}


echo'

                     <div class="right-div">
                     <a href="pdg.php">
                     <button type="button" class="btn btn-success">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        Retour
                    </button>
                    </a>
                    
                    <a href="pdg_add.php" class="btn btn-info">Actualiser</a>
                    
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
                                                    <th>Pseudo</th>
                                                    <th>Mail</th>
                                                    <th>'.$rang.'</th>
                                                    <th>Recruter</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
';
    // Get contents of the lspd table
    $reponse = $bdd->query("SELECT * FROM `membres` WHERE `police` = 0 AND `procureur` = 0 AND `juge` = 0 AND `concessionnaire` = 0 AND `mecanicien` = 0 AND `PDG` = 0 AND `ban` = 0");

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
        if($data['pseudo']=="All" or $data['pseudo']=="System"){
            continue;
        }
?>
                                               <tr class="odd gradeX">

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
                                                    <td>
                                                        <?php
        echo $data[$rang];
?>
                                                   </td>


                                                     <?php
                                                     if($data['Admin'] == 1){
                                                         echo '<form action="pdg_add.php?statut=3" method="post">
        <td>
                                                             <button type="submit" class="btn btn-warninng">
                                                                <span class="glyphicon glyphicon-ok"></span>
                                                             </button>
                                                     </td></form>';
                                                     }else {
                                                         if ($data['id'] == $_SESSION['id']) {
                                                             echo '<form action="pdg_add.php?statut=2" method="post">
        <td>
                                                             <button type="submit" class="btn btn-warninng">
                                                                <span class="glyphicon glyphicon-ok"></span>
                                                             </button>
                                                     </td></form>';

                                                         } else {
                                                             echo '<form action="pdg_add_form.php" method="post">
        <td>
                                                            <input type="hidden" name="id" value="' . $data['id'] . '" />
                                                            <input type="hidden" name="rang" value="' . $rang . '" />
                                                             <button type="submit" class="btn btn-success">
                                                                <span class="glyphicon glyphicon-ok"></span>
                                                             </button>
                                                     </td></form>';
                                                         }
                                                     }
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
