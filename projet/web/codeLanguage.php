<?php
session_start();
$login =$_SESSION['pseudo'];
//on appelle les classes qui vont nous servir

require_once '../src/App/Manager/LanguageManager.php';
require_once '../src/App/Entity/Language.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\Language;
use App\Manager\LanguageManager;

//recuperer les codes

$languageManager = new LanguageManager();
$codeLanguages = $languageManager->language();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <header>
        <?php include('include/header.php');
        //recuperer les codes

        $languageManager = new LanguageManager();
        $codeLanguages = $languageManager->language();
        $langue = $languageManager->read(7);
        var_dump('<pre>');
        var_dump($langue);
        var_dump('</pre>');
        die;
        ?>
    </header>

    <main>
    <?php foreach($codeLanguages as $language => $value): ?>  
              <?="id du langage : " .$value['ID_language'];?><br>
              <?="nom du langage : " .$value['Name_language']; ?><br>
              <?="Titre : " . $value['Titre_code']; ?><br>
              <?="Description : " . $value['Desc_code']; ?><br>
              <?="Code : " . $value['CODE']; ?><br>

          <?php endforeach; ?>
    
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>