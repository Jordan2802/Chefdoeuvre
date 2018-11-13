<?php
//page de profil de l'utilisateur
include_once('../include/session.php');
//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées


use App\Manager\UserManager;
use App\Manager\CodeManager;

//on recupere l'utilisteur à mettre à jour à partir de l'id passé dans l'url

$userManager = new UserManager();
$user = $userManager->read($_SESSION['id']);

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>
    <main>
<div class="profil">
    <div class="profilUser">
        <h2>Informations :</h2>
        <p>Pseudo :
        <?= $user->getPseudo()?>
        </p>
        <p>
        email :
        <?= $user->getMail()?>
        </p>
        <div class="btn btn-outline-info my-2 my-sm-0 " onclick="formVisible()">Modifier mon mot de passe</div> <br>
        <?php if(isset($_GET['error2'])){echo $_GET['error2'];}?>
        <form method="post" action="verifProfil.php" class="updateProfil cacher">
        <p><label for="">Ancien mot de passe :</label>
        <input type="password" name="oldpass" id="oldpass" value="<?php if(isset($_GET['oldpass'])){echo $_GET['oldpass'];}?>">
        </p>
        <p>
        <label for="">Nouveau mot de passe :</label>
        <input type="password" name="newpass" id="newpass" value="<?php if(isset($_GET['newpass'])){echo $_GET['newpass'];}?>"> 
        </p>
        <p>
        <label for="">Vérification du nouveau mot de passe :</label>
        <input type="password" name="verifnewpass" id="verifnewpass" value="<?php if(isset($_GET['verifnewpass'])){echo $_GET['verifnewpass'];}?>">
        </p>
        
        <input type="hidden" name="id" value="<?= $user->getId()?>">
        <input type="submit" class="btn btn-outline-info my-2 my-sm-0 " value="Modifier">
    </form>
    <?php if(isset($_GET['error3'])){echo $_GET['error3'];}?>
    <?php if(isset($_GET['valide'])){echo $_GET['valide'];}?>
        
    </div>
    <div class="profilCode">
        <h2>Liste des Help'Codes</h2>
        <?php 
        $codeManager = new CodeManager();
        $idUser = $codeManager->codeUser($_SESSION['id']);
        
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
        
    </div>
</div>
    </main>
    <footer class="d-flex justify-content-around ">
        <?php include('../include/footer.php'); ?>
    </footer>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>