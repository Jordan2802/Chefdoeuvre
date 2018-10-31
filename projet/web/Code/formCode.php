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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>Ajouter un code</title>
</head>

<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>
    <h1 class="titreFormC">Ajouter un code</h1>
    <div class="contentFormC d-flex justify-content-around flex-wrap">
        <div class="descriptionCode">
            <h2>Titre</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto debitis ipsam ducimus omnis doloremque
                id repudiandae voluptatem ut culpa numquam eaque aperiam tempore fugit magnam impedit, vitae earum
                nulla quisquam. Totam qui sit, eligendi nihil porro similique libero error illo repudiandae excepturi
                tempora praesentium odio labore! Dicta consequuntur deleniti alias.</p>
            <h2>Langage</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto debitis ipsam ducimus omnis doloremque
                id repudiandae voluptatem ut culpa numquam eaque aperiam tempore fugit magnam impedit, vitae earum
                nulla quisquam. Totam qui sit, eligendi nihil porro similique libero error illo repudiandae excepturi
                tempora praesentium odio labore! Dicta consequuntur deleniti alias.</p>
            <h2>Description</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto debitis ipsam ducimus omnis doloremque
                id repudiandae voluptatem ut culpa numquam eaque aperiam tempore fugit magnam impedit, vitae earum
                nulla quisquam. Totam qui sit, eligendi nihil porro similique libero error illo repudiandae excepturi
                tempora praesentium odio labore! Dicta consequuntur deleniti alias.Lorem ipsum dolor sit amet,
                consectetur adipisicing elit. Iusto debitis ipsam ducimus omnis doloremque
                id repudiandae voluptatem ut culpa numquam eaque aperiam tempore fugit magnam impedit, vitae earum
                nulla quisquam. Totam qui sit, eligendi nihil porro similique libero error illo repudiandae excepturi
                tempora praesentium odio labore! Dicta consequuntur deleniti alias.</p>
            <h2>Code</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto debitis ipsam ducimus omnis doloremque
                id repudiandae voluptatem ut culpa numquam eaque aperiam tempore fugit magnam impedit, vitae earum
                nulla quisquam. Totam qui sit, eligendi nihil porro similique libero error illo repudiandae excepturi
                tempora praesentium odio labore! Dicta consequuntur deleniti alias.</p>
        </div>
        <div id="formCode">
            <form method="post" action="createCode.php" class="form-group ">
                <p><label for="titre" data-toggle="tooltip" data-placement="left" title="Tooltip on top">Titre :</label>
                    <input type="text" name="titre" id="titre" class="form-control">
                </p>
                <p>
                    <label for="selectLang" data-toggle="tooltip" data-placement="left" title="Tooltip on top">langage
                        :</label>
                    <select name="language" class="form-control" id="selectLang">
                        <?php foreach($languages as $language => $value): ?>
                        <option value="<?= $value['ID_language'];?>">
                            <?= $value['Name_language']; ?>
                        </option>

                        <?php endforeach; ?>
                    </select>
                </p>
                <p>
                    <label for="description" data-toggle="tooltip" data-placement="left" title="Tooltip on top">Description
                        :</label>
                    <textarea name="description" id="description" class="form-control" rows="10" cols="50"></textarea>
                </p>
                <p>
                    <label for="code" data-toggle="tooltip" data-placement="left" title="Tooltip on top">Code :</label>
                    <textarea name="code" id="code" class="form-control" rows="15" cols="50"></textarea>
                </p>
                <input type="submit" class="btn btn-outline-info my-2 my-sm-0 " value="Ajouter un Code">
            </form>
        </div>
    </div>
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
