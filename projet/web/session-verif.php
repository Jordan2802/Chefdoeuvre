<?php

session_start();

if(!isset($_SESSION['logged'])|| !$_SESSION['logged']){
    header('location: session.php?error=3');
}


$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';


?>