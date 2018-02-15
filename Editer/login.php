<?php
session_start();

include( "config.php" );

function get_ip()
{
    if ( isset ( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif ( isset ( $_SERVER['HTTP_CLIENT_IP'] ) )
    {
        $ip  = $_SERVER['HTTP_CLIENT_IP'];
    }
    else
    {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         if($userinfo['allowed'] == 0){
            $erreur = "Vous n'êtes pas encore autorisé à vous connecter !";
        } else {
             $_SESSION['police'] = $userinfo['police'];
             $_SESSION['procureur'] = $userinfo['procureur'];
             $_SESSION['juge'] = $userinfo['juge'];
             $_SESSION['concessionnaire'] = $userinfo['concessionnaire'];
             $_SESSION['mecanicien'] = $userinfo['mecanicien'];
             $gm = 0;
             $gm =  $_SESSION['police'] + $_SESSION['procureur'] + $_SESSION['juge'] + $_SESSION['concessionnaire'] + $_SESSION['mecanicien'];
             if($gm == 0){
                 $erreur = "Vous n'avez pas encore de grade. Merci de bien vouloir contacter un administrateur";
             } else {
                 if (isset($gm) and is_numeric($gm) and ($gm == 1)){
                     $_SESSION['id'] = $userinfo['id'];
                     $_SESSION['pseudo'] = $userinfo['pseudo'];
                     $_SESSION['mail'] = $userinfo['mail'];
                     $_SESSION['Admin'] = $userinfo['Admin'];
                     $_SESSION['annonce'] = 0; //Todo : a mettre à 0 quand les annonces sont fini

                     $req = $bdd->prepare('UPDATE membres SET lastConnection = NOW() + INTERVAL 1 HOUR , lastIp = ? WHERE membres.id = ?');


                     $req->bindParam(1, get_ip(), PDO::PARAM_STR);
                     $req->bindParam(2, $_SESSION['id'], PDO::PARAM_INT);

                     $req->execute();

                     header("Location: police.php?id=" . $_SESSION['id']);

                 }else {
                     $erreur = "Une erreur c'est produite au niveau de vos grades. Merci de bien vouloir contacter un administrateur";
                 }
             }
         
         }
      } else {
         $erreur = "Email address or password is invalid !";
      }
   } else {
      $erreur = "All fields should be completed !";
   }
}
?>
<html >
<head>
    <link rel="icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" /><![endif]-->
  <meta charset="UTF-8">
  <title>Login</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <body class="align">

  <div class="grid">

<form method="POST" action="" class="form login">

      <header class="login__header">
	    <img src="https://lossantospolicedepartmentlspd.weebly.com/uploads/2/5/6/4/25644844/6606452.png">
        <h3 class="login__title">LSPD Login</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input type="email" name ="mailconnect" placeholder="eMail">
        </div>

        <div class="form__field">
          <input type="password" name="mdpconnect" placeholder="password">
        </div>

      </div>

      <footer class="login__footer">
        <input type="submit" value="Login" name="formconnexion">

        <p><span class="icon icon--info">?</span><a href="#">Forgot your password</a></p>
      </footer>

    </form>
<?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
  </div>

</body>
  
  
</body>
</html>
