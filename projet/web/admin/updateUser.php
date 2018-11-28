<?php
include_once('verifAdmin.php');
//page qui update les information modifié d'un utilisateur
//on appelle les classes qui vont nous servir
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\User;
use App\Manager\UserManager;


//on récupère l'utilisateur à mettre à jour à partir de l'id passé dans l'url. pas besoin de récuperer l'id car il est géré par la bdd.

$userManager = new UserManager();
$user = $userManager->read($_POST['id']);

$user->setPseudo($_POST["pseudo"]);
$user->setPassword($_POST["motDePasse"]);
$user->setMail($_POST["mail"]);


//mise à jour de l'objet contact

$saveIsOk = $userManager->save($user);

if($saveIsOk){
    $message = 'l\'utilisateur à été modifié';
}
else{
    $message = 'l\'utilisateur n\'a pas été modifié';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modification d'un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
</head>
<body>
    <h1>Mise à jour d'un utilisateurs</h1>

    <p><a href="admin.php">Retour à l'admin</a></p>

    
    <p><?= $message ?></p>
</body>
</html>

