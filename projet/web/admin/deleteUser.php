<?php
include_once('verifAdmin.php');
//page ADMIN qui va supprimer un utilisateur.
//on appelle les classes qui vont nous servir
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\User;
use App\Manager\UserManager;

//on récupère l'utilisateur à mettre à jour à partir de l'id passé dans l'url. pas besoin de récuperer l'id car il est géré par la bdd.

$userManager = new UserManager();
$user = $userManager->read($_GET['id']);

$deleteIsOk = $userManager->delete($user);

if($deleteIsOk){
    $message = 'l\'utilisateur a été supprimé';
}
else{
    $message = 'Une erreur est survenue';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Suppression d'un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>
    <h1>Suppression d'un utilisateur</h1>

    <p><a href="admin.php">Retour à l'admin</a></p>

    <p><?= $message ?></p>
</body>
</html>