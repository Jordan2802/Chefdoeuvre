<?php


/******************************************** */
namespace App\Manager;

use PDO;
use App\Entity\User;

/****************************************** */



class UserManager{


    /**
     * objet PDO lié à la base de données "Intégration_code". elle est stockée dans une variable
     * pour être utilisé plus facilement dans les différentes méthodes
     *
     * @var \PDO $pdo
     */
    private $pdo;


    /**
     * objet pdoStatement résultant de l'utilisation des méthodes PDO::query et PDO::prepare.
     *  il est stocké dans une variable pour faciliter son utilisation
     *
     * @var \PDOStatement   $pdoStatement
     */
    private $pdoStatement;

    /**
     * UserManager  constructor.
     * initialisation de la connexion à la base de donnée. 
     */
    public function __construct(){

        $host_name = 'localhost';
        $database = 'integration_code';
        $user_name = 'root';
        $password = '';

        $this->pdo = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
    } 
    
    /**
     * insert un objet user dans la base de donnée et met à jour l'objet passé en argument en lui 
     * spécifiant un identifiant.
     *
     * @param User $user    objet de type User passé par référence.
     * @return bool true si l'objet a été inseré, false si une erreur survient
     */
    private function create(User &$user){

        $this->pdoStatement = $this->pdo->prepare('INSERT INTO user VALUES (NULL, :pseudo, :passwords, :mail) ');

        //liaison des parametres

        $this->pdoStatement->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':passwords', $user->getPassword(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':mail', $user->getMail(), PDO::PARAM_STR);

        //executer la requete

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){
            return false;
        }
        else{
            
            $id = $this->pdo->lastInsertId();
            $user = $this->read($id);


            return true;
        }

    }


    /**
     * Récupère un objet User à partir de l'identifiant
     *
     * @param int  $id  identifiant d'un contact
     * @return bool|User|null false si une erreur survient, un objet user si une sorrespondance est trouvée, Null
     */
    public function read($id){

      $this->pdoStatement =  $this->pdo->prepare('SELECT * FROM user WHERE ID_user= :id ');

      //liaison des parametres

      $this->pdoStatement->bindValue(':id',$id, PDO::PARAM_INT);

      //éxécution de la requête

      $executeIsOk = $this->pdoStatement->execute();

      if($executeIsOk){

        $user = $this->pdoStatement-> fetchObject('App\Entity\User');

        if($user===false){
            return null;
        }
        else{
            return $user;
        }

      }
      else{
          //erreur d'execution
          return false;
      }

    }


    /**
     * Récupère tous les objets User de la bdd
     *
     * @return array|bool tableau d'objet User ou un tableau vide s'il n'y a aucun objet dans la 
     * bdd, ou false si une erreur survient
     */
    public function readAll(){


        $this->pdoStatement = $this->pdo->query('SELECT * FROM user ORDER BY Pseudo_user, Mail_user');

        //construction d'un tableau d'objet de type User
        
   

        return $this->pdoStatement->fetchAll();
    }


    /**
     * Met à jour un objet stocké en bdd
     *
     * @param User $user objet de type User
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    private function update(User $user){

        $this->pdoStatement = $this->pdo->prepare('UPDATE user 
        set Pseudo_user=:pseudo, Password_user=:passwords, mail_user=:mail
        WHERE ID_user=:id 
        LIMIT 1');

        //liaison des parametres

        $this->$pdoStatement->bindValue(':pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $this->$pdoStatement->bindValue(':passwords', $user->getPassword(), PDO::PARAM_STR);
        $this->$pdoStatement->bindValue(':mail', $user->getMail(), PDO::PARAM_STR);
        $this->$pdoStatement->bindValue(':id', $user->getId(), PDO::PARAM_INT);

        //execution de la requete

        return $this->pdoStatement->execute();

    }

    /**
     * Supprime un objet stocké en bdd
     *
     * @param User $user objet de type User
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    public function delete(User $user){

        $this->pdoStatement = $this->pdo->prepare('DELETE FROM user WHERE ID_user = :id LIMIT 1');

        $this->$pdoStatement->bindValue(':id', $user->getId(), PDO::PARAM_INT);

        //execution de la requete

        return $this->pdoStatement->execute();

    }


    /**
     * insere un objet en bdd et crée l'objet passé en argument en lui spécifiant un identifiant
     * ou le met à jour dans la bdd s'il en est issu
     *
     * @param User $user    objet User passé par référence (&)
     * @return bool true en cas de succes ou false en cas d'erreur
     */
    public function save(User &$user){

        if(is_null($user->getId())){
            return $this->create($user);
        }
        else{
            return $this->update($user);
        }

    }


}