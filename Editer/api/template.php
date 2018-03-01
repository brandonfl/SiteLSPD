<?php
header('Content-Type: application/json');
$password = "bourlay";
$success = false;
$data = array();
include('config.php');

function reponse_json($success, $data, $msgErreur=NULL) {
	$array['success'] = $success;
	$array['msg'] = $msgErreur;
	$array['result'] = $data;

	echo json_encode($array);
}
