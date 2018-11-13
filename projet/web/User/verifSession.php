<?php
//page qui va vérifié la connexion d'un utilisateur.
session_start();
//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées

use App\Manager\UserManager;


if(!empty($_POST)){

$passW = htmlentities($_POST["password"]);
$pseudo =htmlentities($_POST["pseudo"]);

/**
     * on recupere les informations des champs du formulaire dans une boucle et on verifie qu'ils ne soient pas vide
     */
    foreach ($_POST as $name => $value) {
        if(empty($_POST[$name])){

            $messageChamps .= "le champ ".$name." est vide. <br>";
            
            $messageError= true;           

        }
    }

    /**
     * si le message d'erreur est true alors on redirige vers le formulaire de création.
     */
    if($messageError){
        header('location: ../index.php?error='.$messageChamps.'&pseudo='.$pseudo.'&mdp='.$passW);
    }else{

    
    $userManager = new UserManager();
    $verifSession = $userManager->login($pseudo);
    $_SESSION['id'] = $verifSession["ID_user"];
    
    $pass = password_verify($passW, $verifSession["Password_user"]);
    if($pass){
        if($pseudo==="rhudra"){
            header('location: ../admin/admin.php'); 
        }else{
            header('location: accueil.php');
        }
    }else{
        $messageSession .= "l'utilisateur <b>".$pseudo."</b> ne correspond pas. Vérifiez votre pseudo et votre mot de passe. <br>";
        header('location: ../index.php?error='.$messageSession);
    }
}

}

