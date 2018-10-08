

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire pour ajouter un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="main.js"></script>
</head>
<body>

<h1>Ajouter un contact</h1>

<p><a href="index.html">Retour au sommaire</a></p>
    <form method="post" action="createuser.php">
        <p><label for="">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo">
        </p>
        <p>
        <label for="">Password :</label>
        <input type="text" name="passwords" id="password"> 
        </p>
        <p>
        <label for="">mail :</label>
        <input type="email" name="mail" id="mail">
        </p>
        
        
        <input type="submit" value="Créer un compte">
    </form>
</body>
</html>
