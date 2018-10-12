<?php

//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\User;
use App\Manager\UserManager;

//création d'un nouveau contact à partir des données du formulaire

$user = new User();



$user -> setPseudo( $_POST['pseudo'])
-> setPassword( $_POST['motDePasse'])
-> setMail( $_POST['mail']);

//insertion en bdd via le manager

$userManager = new UserManager();

$saveIsOk = $userManager-> save($user);

if($saveIsOk){
    $message= 'l\'utilisateur a été ajouté';
}
else{
    $message = 'l\'utilisateur n\'a pas été ajouté';
    
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajout d'un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>
    <h1>Insertion d'un utilisateur</h1>
    <p><a href="../acceuil.html">Retour au sommaire</a></p>
    
    <p><?= $message?></p>
</body>
</html>