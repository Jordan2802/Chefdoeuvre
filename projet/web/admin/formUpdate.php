<?php
include_once('verifAdmin.php');
//page qui va permettre de mettre à jour le profil utilisateur à partir du formulaire.
//on appelle les classes qui vont nous servir
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées


use App\Manager\UserManager;

//on recupere l'utilisteur à mettre à jour à partir de l'id passé dans l'url

$userManager = new UserManager();
$user = $userManager->read($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire pour ajouter un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   
</head>
<body>

<h1>Ajouter un contact</h1>

<p><a href="admin.php">Retour à l'admin</a></p>
    <form method="post" action="updateUser.php">
        <p><label for="">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" value="<?= $user->getPseudo()?>">
        </p>
        <p>
        <label for="">Password :</label>
        <input type="text" name="motDePasse" id="password" value="<?= $user->getPassword()?>"> 
        </p>
        <p>
        <label for="">mail :</label>
        <input type="email" name="mail" id="mail" value="<?= $user->getMail()?>">
        </p>
        
        <input type="hidden" name="id" value="<?= $user->getId()?>">
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
