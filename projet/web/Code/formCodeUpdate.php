<?php
//page qui permet à un utilisateur de modifier le code partagé.
include_once('../include/session.php');
//on appelle les classes qui vont nous servir
require_once '../../src/App/Manager/AllManager.php';
require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';

//on indique l'espace de nom des classes utilisées


use App\Manager\CodeManager;

//on recupere le code à mettre à jour à partir de l'id passé dans l'url

$codeManager = new CodeManager();
$code = $codeManager->read($_POST['idCode']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire pour ajouter un code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
</head>
<body>
<main>
    <div class="retour">
<h1>Modifier un code</h1>
<?php 
    if($login==="rhudra"){
        ?> 
            <p><a href="../admin/admin.php">Retour admin</a></p>
        <?php
    }else{
        ?> 
            <p><a href="../User/profilUser.php">Retour au profil</a></p>
        <?php
    }
?>
</div>
    <form method="post" action="updateCode.php" class="formCodeUpdate">
        <p><label for="">Titre :</label>
        <input type="text" name="titre" id="titre" value="<?= $code['Titre_code']?>" >
        
        </p>
        <p>
        <label for="">Description :</label>
        <textarea name="description" id="description" class="form-control" rows="10" cols="50" ><?= $code['Desc_code']?></textarea>
        </p>
        <p>
        <label for="">Code :</label>
        <textarea name="code" id="code" class="form-control" rows="15" cols="50" ><?= $code['CODE']?></textarea>
        </p>
        
        <input type="hidden" name="id" value="<?= $code['ID_code']?>">
        <input type="submit" class="btn btn-outline-info my-2 my-sm-0 " value="Modifier">
    </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
