<?php

//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées


use App\Manager\CodeManager;

//on recupere le code à mettre à jour à partir de l'id passé dans l'url

$codeManager = new CodeManager();
$code = $codeManager->read($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire pour ajouter un code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>

<h1>Ajouter un code</h1>

<p><a href="../acceuil.html">Retour au sommaire</a></p>
    <form method="post" action="updateCode.php">
        <p><label for="">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?= $code->getTitreCode()?>">
        </p>
        <p>
        <label for="">Description :</label>
        <input type="text" name="description" id="description" value="<?= $code->getDescCode()?>"> 
        </p>
        <p>
        <label for="">Code :</label>
        <input type="text" name="code" id="code" value="<?= $code->getCode()?>">
        </p>
        
        <input type="hidden" name="id" value="<?= $code->getIdCode()?>">
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
