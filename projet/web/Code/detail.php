<?php
// page qui détail un code selectionné.
session_start();
$login =$_SESSION['pseudo'];
if(!$login){
    header('location: ../index.php');
}

//on appelle les classes qui vont nous servir

require_once '../../src/App/Manager/CodeManager.php';
require_once '../../src/App/Entity/IntCode.php';
include('namePrism.php');

//on indique l'espace de nom des classes utilisées

use App\Entity\IntCode;
use App\Manager\CodeManager;

$codeManager = new CodeManager();
$detail = $codeManager->read($_POST['idCode']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link href="../css/prism.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />

    <title>
        <?= $detail['Titre_code']; ?>
    </title>
</head>

<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>
    <main>
        <div class="blocDetail d-flex justify-content-around ">
            <div class="descDetail">
               <h2> <?=$detail['Titre_code'].'<br>';?></h2>
                <?= $detail['Desc_code'].'<br>';?>
            </div>
            <div class="codeDetail">
                <pre><code class="language-<?= setLanguageName($detail['ID_language']); ?>"><?=$detail['CODE'];?></code></pre>
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
    <script src="../js/prism.js"></script>
</body>

</html>