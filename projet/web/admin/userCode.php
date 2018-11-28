<?php
include_once('verifAdmin.php');
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';
require_once '../../src/App/Entity/IntCode.php';

use App\Manager\CodeManager;

$codeManager = new CodeManager();
$idUser = $codeManager->codeUser($_GET['id']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<p><a href="admin.php">Retour à l'admin</a></p>
<p><a href="deleteAllCode.php?id=<?= $_GET['id'] ?>">Supprimer tout les codes</a></p>
<?php
foreach ($idUser as $key => $value) { ?>
    <div class="codeUser ">
        <h1 id="titreCode">
            <?= $value['Titre_code'] ?>
        </h1> <br>
        <form action="../Code/formCodeUpdate.php" method="post">
            <input type="hidden" name="idCode" value="<?= $value['ID_code'] ?>">
            <input type="hidden" name="idLanguage" value="<?= $value['ID_language'] ?>">
            <button type="submit" class="btn btn-info my-2 my-sm-0">Modifier le code</button>
            <a href="../Code/deleteCode.php?id=<?= $value['ID_code'] ?>" class="btn btn-danger my-2 my-sm-0">Supprimer le code</a>
        </form>
        </div>
        <?php 
} ?>
</body>
</html>