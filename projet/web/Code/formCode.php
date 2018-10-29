<?php session_start();
$login =$_SESSION['pseudo'];
//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/LanguageManager.php';
require_once '../../src/App/Entity/Language.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\Language;
use App\Manager\LanguageManager;

//recuperer les utilisateurs

$languageManager = new LanguageManager();
$languages = $languageManager->readAll();


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
<header>
   
</header>
<h1>Ajouter un code</h1>

<p><a href="../User/accueil.php">Retour à l'accueil</a></p>
    <form method="post" action="createCode.php">
        <p><label for="">Titre :</label>
        <input type="text" name="titre" id="titre">
        </p>
        <p>
        <label for="">langage :</label>
        <select name="language">
        <?php foreach($languages as $language => $value): ?>  
          <option value="<?= $value['ID_language'];?>"><?= $value['Name_language']; ?></option>
        
          <?php endforeach; ?> 
     </select>

 
        </p>
        <p>
        <label for="">Description :</label>
        <textarea  name="description" id="description"></textarea> 
        </p>
        <p>
        <label for="">Code :</label>
        <textarea  name="code" id="code"></textarea> 
        </p>
        
        
        <input type="submit" value="Ajouter un Code">
    </form>
</body>
</html>
