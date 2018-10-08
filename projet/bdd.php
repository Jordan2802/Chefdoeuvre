<?php

###########################################
############ PDO-Extension ################
###########################################


$host_name = 'localhost';
$database = 'integration_code';
$user_name = 'root';
$password = '';

$dbh = null;
try {
  $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );

} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}

?>
