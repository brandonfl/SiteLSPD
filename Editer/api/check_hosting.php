<?php
include('api_config.php');

if(!empty($_GET['password']) and !empty($_GET['id'])){
	//Si toutes les données sont saisie par le client
    if($_GET['password'] == bourlay){

    function CallAPI($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

// Ne pas changer :
    $method = "GET";
    $url = "https://tmi.twitch.tv/hosts";
    //A changer
    $plaque = "DON1";
    $pseudo = "Michel";
    $modele = "twingo";

    //https://tmi.twitch.tv/hosts?include_logins=1&host=211293297


    $request = array("include_logins" => 1,"host" => 211293297);

    $res = CallAPI($method,$url,$request);
    echo($res);


    }else {
        $msg = "Le mot de passe est incorrect";
    }


} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);