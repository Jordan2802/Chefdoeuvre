<?php
include_once('verifAdmin.php');
//on appelle les classes qui vont nous servir
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\IntCode;
use App\Manager\CodeManager;
//on récupère le code à mettre à jour à partir de l'id passé dans l'url. pas besoin de récuperer l'id car il est géré par la bdd.

$codeManager = new CodeManager();

$deleteIsOk = $codeManager->deleteAllCode($_GET['id']);

if($deleteIsOk){
    $message = 'les codes ont été supprimé';
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
    <title>Suppression des codes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
</head>
<body>
    <h1>Suppression des codes</h1>

    <p><a href="admin.php">Retour à l'adminl</a></p>

    <p><?= $message ?></p>
</body>
</html>