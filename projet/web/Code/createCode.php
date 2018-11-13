<?php
//page qui permet d'ajouter un code en base de donnée.
include_once('../include/session.php');


//on appelle les classes qui vont nous servir
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées

use App\Entity\IntCode;
use App\Manager\CodeManager;

//création d'un nouveau code à partir des données du formulaire

$code = new IntCode();

$code -> setTitreCode(htmlentities($_POST['titre']))
-> setDescCode(htmlentities($_POST['description']))
-> setCode(htmlentities($_POST['code']))
-> setIdCodeUser(htmlentities($_SESSION['id']))
-> setIdCodeLanguage(htmlentities($_POST['language']));

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

</head>

<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>
    <main>
        <h1>Insertion d'un code</h1>
        <p><a href="../User/accueil.php">Retour au sommaire</a></p>

        <p>
            <?= $message?>
        </p>
    </main>
    <footer class="d-flex justify-content-around ">
        <?php include('../include/footer.php'); ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>