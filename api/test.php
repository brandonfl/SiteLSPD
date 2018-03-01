<?php

// Method: POST, PUT, GET etc
// Data: array("param" => "value") ==> index.php?param=value

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
$url = "https://lspd-fivelife.fr/api/add_plaque.php";
$password = 'bourlay';


//A changer
$plaque = 'test';
$pseudo = 'Michel';
$modele = 'twingo';


$request = array("plaque" => $plaque,"nom" => $pseudo, "modele" => $modele, "password" => $password);

$this->CallAPI($method, $url, $request);