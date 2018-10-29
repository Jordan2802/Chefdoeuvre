<?php

session_start();
//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées


use App\Manager\UserManager;
$userManager = new UserManager();


$passW = $_POST["password"];
$pseudo = $_POST["pseudo"];



    $verifSession = $userManager->login($pseudo);
    $_SESSION['id'] = $verifSession["ID_user"];
    
    $pass = password_verify($passW, $verifSession["Password_user"]);
    if($pass){
        header('location: accueil.php');
    }else{
        $messageSession .= "l'utilisateur <b>".$pseudo."</b> ne correspond pas. Vérifiez votre pseudo et votre mot de passe. <br>";
        header('location: index.php?error='.$messageSession);
    }



