<!--page de création d'un compte utilisateur-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire pour ajouter un utilisateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
</head>

<body>
    <main>

        <div class="creaForm">
            <h1>Inscription</h1>
            <p><a href="../index.php">Retour à la page de connexion</a></p>
            <p>
                <?php if(isset($_GET['error'])){echo $_GET['error'];}?>
            </p>
            <form method="post" action="verifUser.php">
                <p><label for="">Pseudo :</label><br>
                    <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_GET['pseudo'])){echo $_GET['pseudo'];}?>">
                </p>
                <p>
                    <label for="">Mot de passe :</label><br>
                    <input type="password" name="motDePasse" id="password" value="<?php if(isset($_GET['mdp'])){echo $_GET['mdp'];}?>">
                </p>
                <p>
                    <label for="">Verification du mot de passe :</label><br>
                    <input type="password" name="verifMotDePasse" id="passwordbis" value="<?php if(isset($_GET['verifpass'])){echo $_GET['verifpass'];}?>">
                </p>
                <p>
                    <label for="">mail :</label><br>
                    <input type="email" name="mail" id="mail" value="<?php if(isset($_GET['mail'])){echo $_GET['mail'];}?>">
                </p>

                <p><input type="submit" class="btn btn-outline-info my-2 my-sm-0" value="Créer un compte"></p>
            </form>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
