<?php
session_start(); 

//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\IntCode;
use App\Manager\CodeManager;

//création d'un nouveau code à partir des données du formulaire

$code = new IntCode();

$code -> setTitreCode( $_POST['titre'])
-> setDescCode( $_POST['description'])
-> setCode( $_POST['code'])
-> setIdCodeUser($_SESSION['id'])
-> setIdCodeLanguage($_POST['language']);

//insertion en bdd via le manager

$codeManager = new CodeManager();

$saveIsOk = $codeManager-> save($code);

if($saveIsOk){
    $message= 'le code a été ajouté';
}
else{
    $message = 'le code n\'a pas été ajouté';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajout d'un code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>
    <h1>Insertion d'un code</h1>
    <p><a href="../User/accueil.php">Retour au sommaire</a></p>
    
    <p><?= $message?></p>
</body>
</html>