<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire pour ajouter un code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    
</head>
<body>
<header>
   
</header>
<h1>Ajouter un code</h1>

<p><a href="../accueil.php">Retour à l'accueil</a></p>
    <form method="post" action="createCode.php">
        <p><label for="">Titre :</label>
        <input type="text" name="titre" id="titre">
        </p>
        <p>
        <label for="">Description :</label>
        <input type="textarea" name="description" id="description"> 
        </p>
        <p>
        <label for="">Code :</label>
        <input type="textarea" name="code" id="code">
        </p>
        
        
        <input type="submit" value="Ajouter un Code">
    </form>
</body>
</html>
