<?php
$username = "u606391292_root1"; // username
$password = "cyv3J7v!KGsxCA`6I]"; // password of the database
$hostname = "mysql.hostinger.fr"; // host of the database
$namebase = "u606391292_lspdb"; // name of the database























// Attempt to connect to the database
try
 {
  $bdd = new PDO('mysql:host='.$hostname.';dbname='.$namebase.'', $username, $password);
 }
  catch (Exception $e)
 {
  // If an error is thrown, display the message
  die('Erreur : ' . $e->getMessage());
 }
 ?>
