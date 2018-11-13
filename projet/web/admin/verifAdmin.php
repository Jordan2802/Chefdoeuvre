<?php
session_start();
$login =$_SESSION['pseudo'];
echo $login;
if($login!="rhudra"){
    header('location: ../index.php');
}else{
    echo 'ok';
}