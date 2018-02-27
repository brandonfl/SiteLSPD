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
                                    <li>
                                        <a href="police.php">Police</a>
                                    </li>
                                    <li>
										<a href="administration.php">Administration</a>
									</li>
									<li>
										<a href="administration_annonce.php">Annonce</a>
									</li>
									<li>
										<a href="administration_vehicule.php" class="menu-top-active">Véhicule</a>
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
                            <h4 class="header-line">VEHICULE PANEL</h4>
                        </div>
                    </div>
                    
                     <div class="alert alert-warning alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>En cours de developpement ...</strong></div>
                    
                    <a href="administration_vehicule_add.php" class="btn btn-success pull-right">Ajouter un nouveau véhicule</a>
                    
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
                                                    <th>Plaque</th>
                                                    <th>Type</th>
                                                    <th>Assigné à</th>
                                                    <th>Sorti</th>
                                                    <th>Perdu</th>
                                                    <th>Last</th>
                                                    <th>Delete</th>
                                                    
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
    <strong>Success !</strong> Un nouveau membre a été autorisé</div>
    
    ';}

    
}
    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM vehicule');

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
        echo $data['plaque'];
?>
                                                   </td>
                                                    <td>
                                                        <?php
        echo $data['type'];
?>
                                                   </td>
                                                   <td>
                                                       <?php
                                                       echo $data['assigne'];
                                                       ?>
                                                   </td>
                                                   <?php
                                                       if($data['sorti'] == 1){
                                                           echo '<form action="" method="post">
                                                                    <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-warning" value="' . $data['sorti'] . '" />
                                                     </td></form>';
                                                       }else{
                                                           if($data['sorti'] == 0){
                                                               echo '<form action="" method="post">
                                                                        <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['sorti'] . '" />
                                                     </td></form>';
                                                           }}
                                                   ?>

                                                   <?php
                                                   if($data['perdu'] == 1){
                                                       echo '<form action="" method="post">
                                                                    <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-danger" value="' . $data['perdu'] . '" />
                                                     </td></form>';
                                                   }else{
                                                       if($data['perdu'] == 0){
                                                           echo '<form action="" method="post">
                                                                        <input id="prodId" name="prodId" type="hidden" value="' . $data['id'] . '">
        <td>
                                                             <input type="submit" name="allowItem" class="btn btn-success" value="' . $data['perdu'] . '" />
                                                     </td></form>';
                                                       }}
                                                   ?>
                                                   <td>
                                                       <?php
                                                       echo $data['last'];
                                                       ?>
                                                   </td>

                                                   <form action='delete_bracelet.php' method='post'>
                                                       <?php
                                                       echo '<td>
                                                             <input type="submit" name="deleteItem" class="btn btn-danger" value="' . $data['id'] . '" />
                                                     </td>';
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
