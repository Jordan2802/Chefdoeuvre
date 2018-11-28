<?php
session_start();
$login =$_SESSION['pseudo'];

if($login!="rhudra"){
    header('location: ../index.php');
}