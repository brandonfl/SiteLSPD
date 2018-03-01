<?php
function execInBackground($cmd) {
            if (substr(php_uname(), 0, 7) == "Windows"){
           pclose(popen("start /B ". $cmd, "r"));
        }
    else {
                exec($cmd . " > /dev/null &");
            }
}

$cmd="php ../app/console EmailS2:EnvoiDirecteMailing ".$contenuMail->getId()." ".$injectionSdp." ".$user->getUsername();
$this->execInBackground($cmd);