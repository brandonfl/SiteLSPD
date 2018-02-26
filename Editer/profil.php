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
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <style type="text/css">a:link{text-decoration:none}</style>
        <script>

            $(document).ready(function()
            {
                var navItems = $('.admin-menu li > a');
                var navListItems = $('.admin-menu li');
                var allWells = $('.admin-content');
                var allWellsExceptFirst = $('.admin-content:not(:first)');
                allWellsExceptFirst.hide();
                navItems.click(function(e)
                {
                    e.preventDefault();
                    navListItems.removeClass('active');
                    $(this).closest('li').addClass('active');
                    allWells.hide();
                    var target = $(this).attr('data-target-id');
                    $('#' + target).show();
                });
            });
        </script>
        </head>
        <?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
session_start();





if (isset($_SESSION['id'])) {
    include("config.php");
    $ID=$_SESSION['id'];

    if($_SESSION['juge']==1){
        $nav = '                    <li>
                                        <a href="police.php">Home</a>
                                    </li>
									<li>
										<a href="bracelet.php">Bracelet</a>
									</li>
										<li>
											<a href="trello" target="_blank">Informations Internes</a>
										</li>
										<li>
											<a href="drive" target="_blank">Documents</a>
										</li>';

        $logo = '<a class="navbar-brand" href="police.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>';

        $rang = 'Juge';
    }else{
        if($_SESSION['police']==1 or $_SESSION['procureur']==1){
            if($_SESSION['procureur']==1){
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
											<a href="trello" target="_blank">Informations Internes</a>
										</li>
										<li>
											<a href="drive" target="_blank">Documents</a>
										</li>';
            }else{
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
											<a href="trello" target="_blank">Informations Internes</a>
										</li>
										<li>
											<a href="drive" target="_blank">Documents</a>
										</li>';
            }


            $logo = '<a class="navbar-brand" href="police.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>';

            if($_SESSION['police']==1){
                $rang = 'Police';
            }else{
                $rang = 'Procureur';
            }
        }else{
            if($_SESSION['concessionnaire']==1){
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
                $logo='<a class="navbar-brand" href="concessionnaire.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>';

                $rang = 'Concessionnaire';

            }else{
                if($_SESSION['mecanicien']==1){
                    $nav = '                    <li>
                                        <a href="mecanicien.php">Home</a>
                                    </li>
									<li>
										<a href="mecanicien_add.php">Ajouter un controle technique</a>
									</li>
										<li>
											<a href="serveur" target="_blank">Ville</a>
										</li>';

                    $logo='<a class="navbar-brand" href="mecanicien.php">
                            <img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
                        </a>';

                    $rang = 'Mecanicien';
                }else{
                        header("Location: index.php");
                }
            }
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
                            <h4 class="header-line">Profil</h4>
                        </div>
                    </div>
                                        

                                    ';

    if (isset($error)) {

        if($error == 0){
            echo '
    <div class="alert alert-success alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success !</strong> Le mot de passe a été modifié</div>
    
    ';}

        if($error == 1){
    echo '
    <div class="alert alert-danger alert-dismissable fade in">
    <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Attention !</strong> Le mot de passe de confirmation doit être le même que le nouveau proposé</div>
    
    ';}

    
}

    if($_SESSION['Admin'] == 1){
        $ad = '<a href="administration.php"><div class="label label-danger">Administrateur</div></a>';
    }else{
        $ad = ' ';
    }

    echo '
                                            
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  
        <div class="row">

            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked admin-menu" >
                    <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i> Profil</a></li>
                    <li><a href="" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Changer son mot de passe</a></li>
                </ul>
            </div>

            <div class="col-md-9  admin-content" id="profile">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Nom</h3>
                    </div>
                    <div class="panel-body">
                        '.$_SESSION['pseudo'].'
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Email</h3>
                    </div>
                    <div class="panel-body">
                        '.$_SESSION['mail'].'
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Rang</h3>
                    </div>
                    <div class="panel-body">
                         <div class="label label-success">'.$rang.'</div>
                         '.$ad.'
                    </div>
                </div>
                
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Derniere Connexion</h3>

                    </div>
                    <div class="panel-body">
                        '.$_SESSION['connexion'].'
                    </div>
                </div>

            </div>

            <div class="col-md-9  admin-content" id="change-password">
                <form action="edit-password.php" method="post">

           
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="new_password" class="control-label panel-title">Nouveau mot de passe</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="new_password" >
                                </div>
                            </div>

                        </div>
                    </div>

             
                    <div class="panel panel-info" style="margin: 1em;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><label for="confirm_password" class="control-label panel-title">Confirmez le nouveau mot de passe</label></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm_password" >
                                </div>
                            </div>
                        </div>
                    </div>

           
                    <div class="panel panel-info border" style="margin: 1em;">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="pull-left">
                                        <input type="hidden" name="id" id="id" value="' . $_SESSION['id'] . '">
                                    <input type="submit" class="form-control btn btn-primary" name="submit" id="submit">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

           



                </div>

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
             Coded by :  Glen McMahon
        </div>
    </div>
</div> </section> <!-- FOOTER SECTION END--> <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  --> <!-- CORE JQUERY  --> <script src="assets/js/jquery-1.10.2.js"></script> <!-- BOOTSTRAP SCRIPTS  --> <script src="assets/js/bootstrap.js"></script> <!-- DATATABLE SCRIPTS  --> <script src="assets/js/dataTables/jquery.dataTables.js"></script> <script src="assets/js/dataTables/dataTables.bootstrap.js"></script> <!-- CUSTOM SCRIPTS  --> <script src="assets/js/custom.js"></script> </body>';
} else {
    header("Location: login.php");
}
?> </html>
