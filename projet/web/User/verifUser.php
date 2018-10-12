<?php

/**
 * page de vérifiaction du formulaire de création d'utilisateur
 */


$messageChamps="";
$messageError = false;


/**
 * on verifie que le $_POST n'est pas vide.
 */
if(!empty($_POST)){

    $pseudo = htmlentities($_POST["pseudo"]);
    $mail = $_POST['mail'];
    $pass = sha1($_POST['motDePasse']);
    $passbis = $_POST['verifMotDePasse'];
    /**
     * on recupere les informations des champs du formulaire dans une boucle et on verifie qu'ils ne soient pas vide
     */
    foreach ($_POST as $name => $value) {
        if(empty($_POST[$name])){

            $messageChamps = "le champ ".$name." est vide. <br>";
            echo $messageChamps;

            $messageError= true;           

        }
    }


    /**
     * si le message d'erreur est true alors on redirige vers le formulaire de création.
     */
    if($messageError){



        header('location: form.php?');
    }

}
?>