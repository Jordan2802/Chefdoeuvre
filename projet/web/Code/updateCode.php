<?php
session_start(); 
//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\IntCode;
use App\Manager\CodeManager;


//on récupère le code à mettre à jour à partir de l'id passé dans l'url. pas besoin de récuperer l'id car il est géré par la bdd.

$codeManager = new CodeManager();
$code = $codeManager->read($_POST['id']);

$code->setTitreCode($_POST["titre"]);
$code->setDescCode($_POST["description"]);
$code->setCode($_POST["code"]);


//mise à jour de l'objet code

$saveIsOk = $codeManager->save($code);

if($saveIsOk){
    $message = 'le code à été modifié';
}
else{
    $message = 'le code n\'a pas été modifié';
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modification d'un code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>
    <h1>Mise à jour d'un code</h1>

    <p><a href="../accueil.php">Retour au sommaire</a></p>

    
    <p><?= $message ?></p>
</body>
</html>

