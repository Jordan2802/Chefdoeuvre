<?php
require_once('session-verif.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour <?php echo $login ?>!</h1>

    <p><a href="logout.php">se deconnecter.</a></p>
</body>
</html>