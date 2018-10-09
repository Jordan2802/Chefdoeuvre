<?php

//on appelle les classe qui vont nous servir

require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\User;
use App\Manager\UserManager;

//recuperer les utilisateurs

$userManager = new UserManager();
$users = $userManager->readAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lister les utilisateurs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>
    <h1>Lister les utilisateurs</h1>

    <p><a href="../index.html">Retour au sommaire</a></p>

    <?php if(empty($users)): ?>
        <p>il n'y a aucun utilisateur à afficher</p>

    <?php else:?>   
        <?php if($users === false): ?>
            <p>Une erreur est survenue</p>

        <?php else: ?>
            <ul>
                <?php
                
                 foreach($users as $user => $value): ?>
                    <li> Pseudo : <?= $value['Pseudo_user'] . "</br> mail: ".$value['Mail_user'] ?> 
                    - <a href="formUpdate.php?id=<?= $value['ID_user']; ?>">Modifier</a>
                    - <a href="deleteUser.php?id=<?= $value['ID_user']; ?>">Supprimer</a>
                    
                    </li>
                <?php endforeach; ?>


            </ul>

        <?php endif; ?>

    <?php endif; ?>
</body>
</html>