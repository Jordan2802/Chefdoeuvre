<?php
//page de profil de l'utilisateur
session_start();
$login =$_SESSION['pseudo'];
if(!$login){
    header('location: ../index.php');
}
//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/UserManager.php';
require_once '../../src/App/Entity/User.php';

//on indique l'espace de nom des classes utilisées


use App\Manager\UserManager;

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
<div class="profil"></div>
    <div class="profilUser">
        <p>Pseudo :
        <?= $user->getPseudo()?>
        </p>
        <p>
        mail :
        <?= $user->getMail()?>
        </p>
        <button class="btn btn-outline-info my-2 my-sm-0 " >Modifier mon mot de passe</button>
        <form method="post" action="updateUser.php" id="updateProfil">
        <p><label for="">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" value="<?= $user->getPseudo()?>">
        </p>
        <p>
        <label for="">Password :</label>
        <input type="text" name="motDePasse" id="password" value="<?= $user->getPassword()?>"> 
        </p>
        <p>
        <label for="">mail :</label>
        <input type="email" name="mail" id="mail" value="<?= $user->getMail()?>">
        </p>
        
        <input type="hidden" name="id" value="<?= $user->getId()?>">
        <input type="submit" value="Modifier">
    </form>
    
        
    </div>
    <div class="profilCode">

    </div>
</div>
    </main>
    <footer class="d-flex justify-content-around border-top ">
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