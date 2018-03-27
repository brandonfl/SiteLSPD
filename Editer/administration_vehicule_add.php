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
		if (isset($_SESSION[ 'id']) and  $_SESSION['Admin'] == 1) {


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
			<div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Add a Vehicule
					<p></p>
					<p></p>
				</div>
				<div class="panel-body">
					<form action="administration_vehicule_add_form.php" method="post">
					
					<div class="form-group">
								<label for="message">Plaque *</label> :
								<p class="help-block">ex AB123YZ</p>
								<input type="text" name="plaque" id="plaque" class="form-control" required />
								<br />
							</div>
					
						<p>
							';


          echo'  <div class="form-group">
								<label for="nom">Type *</label> :
								<select name="type" id="type" class="form-control" required >



            ';

		      $reponse2 = $bdd->query('SELECT * FROM type');

    // Display each entry one by one
    while ($data = $reponse2->fetch()) {
            echo '<option value="' . $data['type'] . '">' . $data['type'] . '</option>';
    }
            $reponse2->closeCursor(); // Complete query

		    echo '</select>
								<br />
							</div>';

           echo' <div class="form-group">
								<label for="nom">Agent *</label> :
								<select name="pseudo" id="pseudo" class="form-control" required >



            ';

		      $reponse = $bdd->query('SELECT * FROM membres WHERE police=1');

    // Display each entry one by one
    while ($data = $reponse->fetch()) {
        if($data['pseudo'] == 'All'){
            echo '<option value="' . $data['pseudo'] . '" selected>' . $data['pseudo'] . '</option>';
        }else {
            echo '<option value="' . $data['pseudo'] . '">' . $data['pseudo'] . '</option>';
        }


    }
            $reponse->closeCursor(); // Complete query

		    echo '</select>
								<br />
							</div>';


		    echo'
                            
							
							
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
                   &copy; 2017 LSPD | Coded by : Glen McMahon
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
			</body>'; } else { header( "Location: login.php"); } ?>
		</html>
