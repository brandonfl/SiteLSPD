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
    //echo($res);

    //echo('</br>');

    $firstparse = explode('[',$res);
    //print_r($firstparse);
    //print($firstparse[1]);

        $secondparse = explode("]",$firstparse[1]);
        //print_r($secondparse);
        //print($secondparse[0]);

            $json = json_decode($secondparse[0]);
            //print_r($json);

                //$resultat = false;
        $int = $json->{'target_id'};
        //print($int);

        if(is_int($int)){
            $resultat = true;
        }else{
            $resultat = false;
        }

                //echo("hey");

                $success = $resultat;
                $msg = "API fonctionnelle, voici le resultat";
                $data = $json;






    }else {
        $msg = "Le mot de passe est incorrect";
    }


} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);