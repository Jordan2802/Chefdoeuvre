<?php
//page ADMIN qui liste tout les codes partagé sur le site.
//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\IntCode;
use App\Manager\CodeManager;

//recuperer les utilisateurs

$codeManager = new CodeManager();
$codes = $codeManager->readAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lister les codes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>
    <h1>Lister les codes</h1>

    <p><a href="../accueil.php">Retour au sommaire</a></p>

    <?php if(empty($codes)): ?>
        <p>il n'y a aucun code à afficher</p>

    <?php else:?>   
        <?php if($codes === false): ?>
            <p>Une erreur est survenue</p>

        <?php else: ?>
            <ul>
                <?php
                
                 foreach($codes as $code => $value): ?>
                    <li> titre : <?= $value['Titre_code'] . "</br> desription : ".$value['Desc_code']. "</br> code : ".$value['CODE'] ?> 
                    - <a href="formCodeUpdate.php?id=<?= $value['ID_code']; ?>">Modifier</a>
                    - <a href="deleteCode.php?id=<?= $value['ID_code']; ?>">Supprimer</a>
                    
                    </li>
                <?php endforeach; ?>


            </ul>

        <?php endif; ?>

    <?php endif; ?>
</body>
</html>