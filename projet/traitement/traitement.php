<?php

require_once"../bdd.php";

//requete d'insertion

$pdoUser =  $dbh->prepare('INSERT INTO user VALUES (NULL, :Pseudo_user, :Password_user, :Mail_user ) ');

//on lie chaque marqueur à une valeur


$pdoUser -> bindValue(':Pseudo_user', $_POST['pseudo'], PDO::PARAM_STR);
$pdoUser -> bindValue(':Password_user', $_POST['password'], PDO::PARAM_STR);
$pdoUser -> bindValue(':Mail_user', $_POST['mail'], PDO::PARAM_STR);




//execution de la requete

$insertisOk = $pdoUser ->execute();

if($insertisOk){
    $message = "le contact a ete ajouter a la bdd";
}
else{
   $message = "echec de l\insertion"; 
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>test insertion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>insertion des contacts</h1>

    <p><?php echo $message; ?></p>
</body>
</html>