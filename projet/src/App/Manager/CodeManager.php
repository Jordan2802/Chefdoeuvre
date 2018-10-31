<?php


/******************************************** */
namespace App\Manager;

use PDO;
use App\Entity\IntCode;

/****************************************** */



class CodeManager{


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
     * CodeManager  constructor.
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
     * insert un objet IntCode dans la base de donnée et met à jour l'objet passé en argument en lui 
     * spécifiant un identifiant.
     *
     * @param IntCode $code    objet de type code passé par référence.
     * @return bool true si l'objet a été inseré, false si une erreur survient
     */
    private function create(IntCode &$code){

        $this->pdoStatement = $this->pdo->prepare('INSERT INTO code(ID_code, Titre_code, Desc_code, CODE, ID_user, ID_language )
                                                     VALUES (NULL, :titre, :descript, :code, :user, :langage) ');
        //liaison des parametres

        $this->pdoStatement->bindValue(':titre', $code->getTitreCode(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':descript', $code->getDescCode(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':code', $code->getCode(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':user', $code->getIdCodeUser(), PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':langage', $code->getIdCodeLanguage(), PDO::PARAM_INT);

        //executer la requete

        $executeIsOk = $this->pdoStatement->execute();

        if(!$executeIsOk){
            return false;
        }
        else{
            
            $id = $this->pdo->lastInsertId();
            $code = $this->read($id);


            return true;
        }

    }


    /**
     * Récupère un objet IntCode à partir de l'identifiant
     *
     * @param int  $id  identifiant d'un code
     * @return bool|IntCode|null false si une erreur survient, un objet code si une correspondance est trouvée, Null
     */
    public function read($id){

      $this->pdoStatement =  $this->pdo->prepare('SELECT * FROM code WHERE ID_code= :id ');

      //liaison des parametres

      $this->pdoStatement->bindValue(':id',$id, PDO::PARAM_INT);

      //éxécution de la requête

      $executeIsOk = $this->pdoStatement->execute();

      if($executeIsOk){

        $code = $this->pdoStatement-> fetch();

        if($code===false){
            return null;
        }
        else{
            return $code;
        }

      }
      else{
          //erreur d'execution
          return false;
      }

    }


    /**
     * Récupère tous les objets IntCode de la bdd
     *
     * @return array|bool tableau d'objet IntCode ou un tableau vide s'il n'y a aucun objet dans la 
     * bdd, ou false si une erreur survient
     */
    public function readAll(){


        $this->pdoStatement = $this->pdo->query('SELECT * FROM code ORDER BY Titre_code');

        //construction d'un tableau d'objet de type IntCode
        
   

        return $this->pdoStatement->fetchAll();
    }


    /**
     * Met à jour un objet stocké en bdd
     *
     * @param IntCode $code objet de type IntCode
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    private function update(IntCode $code){

        $pdoStatement = $this->pdo->prepare('UPDATE code SET Titre_code=:titre, Desc_code=:descript, CODE=:code WHERE ID_code=:id LIMIT 1');

        //liaison des parametres

        $pdoStatement->bindValue(':titre', $code->getTitreCode(), PDO::PARAM_STR);
        $pdoStatement->bindValue(':descript', $code->getDescCode(), PDO::PARAM_STR);
        $pdoStatement->bindValue(':code', $code->getCode(), PDO::PARAM_STR);
        $pdoStatement->bindValue(':id', $code->getIdCode(), PDO::PARAM_INT);

        //execution de la requete

        return $pdoStatement->execute();

    }

    /**
     * Supprime un objet stocké en bdd
     *
     * @param IntCode $code objet de type IntCode
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    public function deleteCode($code){
        
        $pdoStatement = $this->pdo->prepare('DELETE  FROM code WHERE ID_code = :id LIMIT 1');

        $pdoStatement->bindValue(':id', $code, PDO::PARAM_INT);

        //execution de la requete

        return $pdoStatement->execute();

    }


    /**
     * insere un objet en bdd et crée l'objet passé en argument en lui spécifiant un identifiant
     * ou le met à jour dans la bdd s'il en est issu
     *
     * @param IntCode $code    objet IntCode passé par référence (&)
     * @return bool true en cas de succes ou false en cas d'erreur
     */
    public function save(IntCode &$code){

        if(is_null($code->getIdCode())){
            return $this->create($code);
        }
        else{
            return $this->update($code);
        }

    }



}