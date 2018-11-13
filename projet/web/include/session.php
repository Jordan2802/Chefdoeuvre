<?php
session_start();
$login =$_SESSION['pseudo'];
if(!$login){
    header('location: ../index.php');
}