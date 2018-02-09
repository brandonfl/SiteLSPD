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





if (isset($_SESSION['id'])) {
    echo '

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
                                        <a href="index.php">Home</a>
                                    </li>
                                    <li>
										<a href="add_criminal.php">Ajouter un criminel</a>
									</li>
									<li>
                                        <a href="bracelet.php" class="menu-top-active">Bracelet</a>
                                    </li>
										<li>
											<a href="trello" target="_blank"> Enquetes</a>
										</li>
										<li>
											<a href="plaque" target="_blank">Plaques</a>
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
                            <h4 class="header-line">Bracelet PANEL</h4>
                        </div> 
                    </div>
                    <a href="add_bracelet.php" class="btn btn-success pull-right">Ajouter un bracelet</a>
                    </br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Telephone</th>
                                                    <th>Debut</th>
                                                    <th>Fin</th>
                                                    <th>Dernier pointage</th>
                                                    <th>Fait par</th>
                                                    <th>Pointer</th>
                                                    <th>Supprimer</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                    ';
    include("config.php");
    if (isset($statut)) {
        if($statut == 0){
    echo '
    <div class="alert alert-info alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Uniquement les agents avec un haut niveau d\'habilitation ou le procureur peuvent ajouter un bracelet</div>
    
    ';
    }
    
    if($statut == 1){
    echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Uniquement les agents avec un haut niveau d\'habilitation ou le procureur peuvent effacer un bracelet</div>
    
    ';
    }
    
    if($statut == 2){
    echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Sucess !</strong> Vous avez bien pointer un bracelet electronique  </div>
    
    ';
    }
    
}
    // Get contents of the lspd table
    $reponse = $bdd->query('SELECT * FROM bracelet');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
?>
                                               <tr class="odd gradeX">
                                                    
                                                    
                                                    <td>
                                                        <?php
        echo $data['nom'];
?>
                                                   </td>
                                                    <td>
                                                        <?php
        echo $data['telephone'];
?>
                                                   </td>
                                                    
                                                    <td class="center">
                                                        <?php
        echo $data['debut'];
?>
                                                   </td>
                                                    <td class="center">
                                                        <?php
        echo $data['fin'];
?>
                                                   </td>
                                                   <td class="center">
                                                        <?php
        echo $data['dernier'];
?>
                                                   </td>
                                                   <td class="center">
                                                        <?php
        echo $data['par'];
?>
                                                   </td>
                                                   
                                                    <form action='pointer_bracelet.php' method='post'>
                                                     <?php
        echo '<td>
                                                             <input type="submit" name="updateItem" class="btn btn-success" value="' . $data['id'] . '" />
                                                     </td>';
?>
                                                </form>
                                                   
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
            <a href="https://www.youtube.com/user/davendrix" target="_blank"  > Coded by : Davendrix</a>
            | Updated by : Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}
?> </html>
