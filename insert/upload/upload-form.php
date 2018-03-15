<?php
if(isset($_FILES['avatar'])) {
    $dossier = 'test/';
    $fichier = basename($_FILES['avatar']['name']);

    // Check if file already exists
    if (file_exists($dossier . $fichier)) {
        echo "Sorry, file already exists.";
    }else{
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        echo 'Upload effectué avec succès !';
    } else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
    }
}
}
?>