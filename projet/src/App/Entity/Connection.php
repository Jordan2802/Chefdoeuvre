<?php

namespace App\Entity;


class Connection {
  /// Variables de connexion
  private  $server = 'mysql:host=db760256997.hosting-data.io; dbname=db760256997';

  private  $user = "dbo760256997";

  private  $pass = "chefdoeuvre";
  /// affichage des erreurs
  // les données sont recus sont sous forme de  array (fetch_assoc), possibilité de le changer en objet
  private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

  protected $con;
    /// Connexion à la base de données, affiche un message d'erreur si ça fail (et pas l'erreur php)
    /// enlever le try catch pendant le développement
    public function openConnection() {
      try {
        $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
      return $this->con;
      }
      catch (PDOException $e) {
        echo "Il y a eu un problème pendant la connexion à la base de données " . $e->getMessage();
      }

    }
    /// fermer la connexion
  public function closeConnection() {
    $this->con = null;
      }
}
