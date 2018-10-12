<?php
$login =isset($_POST['login']) ? $_POST['login'] : '';
$password =isset($_POST['password']) ? $_POST['password'] : '';

if($login==''){
    header('location: session.php?error=1');
}elseif($password != "toto"){
    header('location: session.php?error=2&password='.$password);
}else{
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['logged'] = true;

    header('location: session-bienvenue.php');
}


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
    
</body>
</html>