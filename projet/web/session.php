<?php 

$error = isset($_GET['error']) ? $_GET['error'] : '';
$password = isset($_GET['password']) ? $_GET['password'] : '';

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
    <form action="session-login.php" method="post"> 
        <input type="text" name="login" placeholder="votre login"> <br>
        <input type="password" name="password" placeholder="votre mot de passe">
        <input type="submit" value="se connecter" >
    </form>

    <?php
switch ($error) {
    case 1:
        echo "merci de saisir un login";
        break;
    case 2:
        echo "le mot de passe <b>$password</b> n'est pas valide...";
        break;
    case 3:
        echo "Vous avez été déconnecté.";
        break;
}
    ?>
</body>
</html>