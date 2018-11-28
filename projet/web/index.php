<?php
//page de connexion du site
session_start();
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/media.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <title>Help'Code</title>
</head>

<body>
    <h1>SIMPLON Help'Code</h1>
    <div class="formCo">
        <form action="User/verifSession.php" method="post" name="login">
            <h2>Connexion :</h2>
            
        <p><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
            <input type="text" name="pseudo" placeholder="Votre pseudo"> <br>
            <input type="password" name="password" placeholder="Votre mot de passe"> <br>
            
            
            <input type="submit" class="button" name="login" value="Se connecter">
            <p>Pas encore de compte? <a href="User/form.php">"Clique ici"</a></p>
        </form>
    </div>

</body>

</html>
