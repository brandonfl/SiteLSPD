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
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
session_start();





if (isset($_SESSION['id'])) {
    include("config.php");

    if(isset($_GET['plaque'])) {


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
                        <a class="navbar-brand" href="index.php">
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
                                        <a href="police.php">Home</a>
                                    </li>
                                    <li>
										<a href="add_criminal.php">Ajouter un criminel</a>
									</li>
									<li>
										<a href="bracelet.php">Bracelet</a>
									</li>
										<li>
											<a href="trello" target="_blank"> Enquetes</a>
										</li>
										<li>
											<a href="plaque.php" class="menu-top-active">Plaques</a>
										</li>
										<li>
											<a href="drive" target="_blank">Infortations Internes</a>
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
                            <h4 class="header-line">Plaque : ' .$_GET['plaque']. '</h4>
                        </div>
                    </div>';

        $nbplaque = $bdd->query('SELECT COUNT(*) AS nb FROM plaque WHERE plaque =\''.$_GET['plaque'].'\'');

        if(isset($nbplaque)){
            while($datanbplaque = $nbplaque->fetch()){
                $nombreplaque = $datanbplaque['nb'];
            }
        }

        if($nombreplaque==0){
                header('Location: plaque.php?error=1');
            }else {




            $maplaque = $bdd->query('SELECT * FROM plaque WHERE plaque =\''.$_GET['plaque'].'\'');

            if(isset($maplaque)){
                while($datamaplaque = $maplaque->fetch()){

                    echo 'Propriétaire : ' . $datamaplaque['proprietaire'] . '</br>modele de vehicule : '. $datamaplaque['modele'] . '</br>date aquisition : '. $datamaplaque['date'] .'';

                }
            }

            echo ' 
                    </br>
                    </br>
                    <h3>Controle technique</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
            
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Horodateur</th>
                                                    <th>Plaque</th>
                                                    <th>Nom</th>
                                                    <th>Commentaire</th>
                                                    <th>Fin de validite</th>
                                                    <th>Mecanicien</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                    ';


            // Get contents of the lspd table
            $reponse = $bdd->query('SELECT * FROM controle WHERE plaque =\''.$_GET['plaque'].'\'');

            // Display each entry one by one
            while ($data = $reponse->fetch()) {
                ?>
                <tr class="odd gradeX">
                        <td>
                            <?php
                            echo $data['horodateur'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['plaque'];
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $data['nom'];
                            ?>
                        </td>

                        <td class="center">
                            <?php
                            echo $data['commentaire'];
                            ?>
                        </td>
                        <td class="center">
                            <?php
                            echo $data['fin'];
                            ?>
                        </td>
                        <td class="center">
                            <?php
                            echo $data['par'];
                            ?>
                        </td>
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
            <a href="https://www.youtube.com/user/davendrix" target="_blank"  > Coded by : Davendrix</a> &amp; Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
        }


    }else{


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
                        <a class="navbar-brand" href="index.php">
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
                                        <a href="police.php"◊>Home</a>
                                    </li>
                                    <li>
										<a href="add_criminal.php">Ajouter un criminel</a>
									</li>
									<li>
										<a href="bracelet.php">Bracelet</a>
									</li>
										<li>
											<a href="trello" target="_blank"> Enquetes</a>
										</li>
										<li>
											<a href="plaque.php" class="menu-top-active">Plaques</a>
										</li>
										<li>
											<a href="drive" target="_blank">Infortations Internes</a>
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
                            <h4 class="header-line">Rechercher une plaque</h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">';

        if(isset($_GET['error']) and $_GET['error'] == 1){
            echo '<div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Aucune plaque trouvée </div>';
        }
                                
                             echo'   <form action="plaque.php" method="get">
						<p>
							<div class="form-group">
								<label for="nom">Plaque *</label> :
								<p class="help-block">ex: DB111BC</p>
								<input type="text" name="plaque" id="plaque" class="form-control" required />
								<br />
							</div>
							<input type="submit" value="Send" class="btn btn-info" />
						</p>
					</form>
                                        
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
            <a href="https://www.youtube.com/user/davendrix" target="_blank"  > Coded by : Davendrix</a> &amp; Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body> ';


    }

    } else {
    header("Location: login.php");
}
?> </html>
