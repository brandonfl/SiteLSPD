<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<![endif]-->
			<title>LSPD</title>
			<!-- BOOTSTRAP CORE STYLE  -->
			<link href="assets/css/bootstrap.css" rel="stylesheet" />
			<!-- FONT AWESOME STYLE  -->
			<link href="assets/css/font-awesome.css" rel="stylesheet" />
			<!-- CUSTOM STYLE  -->
			<link href="assets/css/style.css" rel="stylesheet" />
			<!-- GOOGLE FONT -->
			<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		</head>
		<?php include( "config.php"); session_start();
		if (isset($_SESSION[ 'id']) and  ($_SESSION['mecanicien'] == 1  or $_SESSION['Admin'] == 1) and isset($_POST['plaque'])) {

            $nbplaque = 0;

		    $reponse = $bdd->query('SELECT COUNT(*) AS nb FROM plaque WHERE plaque =\''.strtoupper($_POST['plaque']).'\'');


            // Display each entry one by one
            while ($data = $reponse->fetch()) {

                $nbplaque = $data['nb'];

            }

		    if(isset($nbplaque) and is_numeric($nbplaque)) {
                $modele = ' ';
                if($nbplaque == 0){
                    $modele='<div class="form-group">
								<label for="message">Modele *</label> :
								<p class="help-block">ex: twingo</p>
								<input type="text" name="modele" id="modele" class="form-control" required />
								<br />
							</div>';
                }


                $nav = '                    <li>
                                        <a href="mecanicien.php">Home</a>
                                    </li>
									<li>
										<a href="mecanicien_add.php" class="menu-top-active">Ajouter un controle technique</a>
									</li>
										<li>
											<a href="serveur" target="_blank">Ville</a>
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
						<a class="navbar-brand" href="mecanicien.php">
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
									' . $nav . '
									</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- MENU SECTION END-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Ajouter une plaque
					<p></p>
					<p></p>
				</div>
				<div class="panel-body">
					<form action="mecanicien_add_post.php" method="post">
						<p>
							<div class="form-group">
								<label for="nom">Propriétaire *</label> :
								<p class="help-block">ex: John Cena</p>
								<input type="text" name="nom" id="nom" class="form-control" required />
								<br />
							</div>
							'.$modele.'
							<div class="form-group">
								<label for="message">Commentaires *</label> :
								<p class="help-block">ex: bon etat/contre visite/prochaine visite ...</p>
								<input type="text" name="commentaire" id="commentaire" class="form-control" required />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Date de fin de validité *</label> :
								<p class="help-block">ex : 2012-12-21</p>
								<input type="date" name="date" id="date" class="form-control" />
								<br />
							</div>
							<input type="hidden" name="plaque" value="' . strtoupper($_POST['plaque']) . '">
							<input type="hidden" name="nb" value="' . $nbplaque . '">
							
							<input type="submit" value="Send" class="btn btn-info" />
						</p>
					</form>
					<p></p>
					<img src="https://image.noelshack.com/fichiers/2015/40/1443969486-lspd-logo-modern-2.png" align="center">
					</div>
				</div>
				<!-- CONTENT-WRAPPER SECTION END-->
				<section class="footer-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
                   &copy; 2017 LSPD |
								 Glen McMahon
							</div>
						</div>
					</div>
				</section>
				<!-- FOOTER SECTION END-->
				<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
				<!-- CORE JQUERY  -->
				<script src="assets/js/jquery-1.10.2.js"></script>
				<!-- BOOTSTRAP SCRIPTS  -->
				<script src="assets/js/bootstrap.js"></script>
			</body>';

            }else{
                header("Location: mecanicien.php?statut=2");
            }
            } else { header( "Location: login.php"); } ?>
		</html>
