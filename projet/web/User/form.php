<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire pour ajouter un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />

</head>

<body>
    <main>

        <h1>Inscription</h1>

        <p><a href="../accueil.php">Retour au sommaire</a></p>
        <?php if(isset($_GET['error'])){echo $_GET['error'];}?>


        <form method="post" action="verifUser.php">
            <p><label for="">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_GET['pseudo'])){echo $_GET['pseudo'];}?>">
            </p>
            <p>
                <label for="">Mot de passe :</label>
                <input type="password" name="motDePasse" id="password" value="<?php if(isset($_GET['mdp'])){echo $_GET['mdp'];}?>">
            </p>
            <p>
                <label for="">Verification du mot de passe :</label>
                <input type="password" name="verifMotDePasse" id="passwordbis" value="<?php if(isset($_GET['verifpass'])){echo $_GET['verifpass'];}?>">

            </p>
            <p>
                <label for="">mail :</label>
                <input type="email" name="mail" id="mail" value="<?php if(isset($_GET['mail'])){echo $_GET['mail'];}?>">

            </p>


            <input type="submit" value="Créer un compte">
        </form>
    </main>
    
</body>

</html>
