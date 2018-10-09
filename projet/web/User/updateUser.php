<?php

//on appelle les classe qui vont nous servir

require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\User;
use App\Manager\UserManager;


//on récupère l'utilisateur à mettre à jour à partir de l'id passé dans l'url. pas besoin de récuperer l'id car il est géré par la bdd.

$userManager = new UserManager();
$user = $userManager->read($_POST['id']);

$user->setPseudo($_POST["pseudo"]);
$user->setPassword($_POST["passwords"]);
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
    <script src="main.js"></script>
</head>
<body>
    <h1>Mise à jour d'un utilisateurs</h1>

    <p><a href="../index.html">Retour au sommaire</a></p>

    
    <p><?= $message ?></p>
</body>
</html>

