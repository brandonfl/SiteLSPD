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
                        <a class="navbar-brand" href="administration.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>
                    </div>
                    <div class="right-div">
                        <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
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
										<a href="administration.php" >Administration</a>
									</li>
									<li>
										<a href="administration_annonce.php" class="menu-top-active">Annonce</a>
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
                            <h4 class="header-line">Annonce PANEL</h4>
                        </div>
                    </div>
                    <a href="administration_annonce_add.php" class="btn btn-success pull-right">Ajouter une annonce</a>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Texte</th>
                                                    <th>Est Actif</th>
                                                    <th>Activer</th>
                                                    <th>Supprimer</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                    ';
    include("config.php");
    
if (isset($statut)) {
        if($statut == 1){
    echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> L\'annonce est bien supprimée  </div>
    
    ';}
    
    if($statut == 2){
echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> L\'annonce est bien désactivée</div>
    
    ';
    }
    
        if($statut == 3){
echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Vous avez bien activé une annonce</div>
    
    ';
    }
    
}
    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM annonce');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
?>
                                               <tr class="odd gradeX">
                                                    <td>
                                                        <?php
        echo $data['id'];
?>
                                                   </td>
                                                    <td>
                                                        <?php
        echo $data['nom'];
?>
                                                   </td>
                                                    <td>
                                                        <?php
        echo $data['texte'];
?>
                                                   </td>
                                                    
                                                    <td class="center">
                                                        <?php
        echo $data['isActive'];
?>
                                                   </td>
                                                  
                                                     <?php
                                                    if($data['isActive'] == 1){
                                                            echo '<form action="administration_annonce_desactiver.php" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['id'] . '" />
                                                     </td></form>';
                                                        }else{
                                                        if($data['isActive'] == 0){
                                                            echo '<form action="administration_annonce_activer.php" method="post">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['id'] . '" />
                                                     </td></form>';
                                                        }}
?>

<?php
                                                            echo '<form action="administration_annonce_delete.php" method="post">
        <td>
                                                             <input type="submit" name="deleteItem" class="btn btn-danger" value="' . $data['id'] . '" />
                                                     </td></form>';
?>
                                                </form>
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
