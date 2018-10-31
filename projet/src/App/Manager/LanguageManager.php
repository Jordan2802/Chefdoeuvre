<?php


/******************************************** */
namespace App\Manager;

use PDO;
use App\Entity\Language;

/****************************************** */



class LanguageManager{


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
     * LanguageManager  constructor.
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
     * Récupère un objet Language à partir de l'identifiant
     *
     * @param int  $id  identifiant d'un langage
     * @return bool|Language|null false si une erreur survient, un objet language si une sorrespondance est trouvée, Null
     */
    public function read($id){

        $this->pdoStatement =  $this->pdo->prepare('SELECT * FROM code
                                                    INNER JOIN language
                                                    ON language.ID_language = code.ID_language 
                                                    INNER JOIN user
                                                    ON code.ID_user = user.ID_user
                                                    WHERE language.ID_language= :id ');
  
       //liaison des parametres

      $this->pdoStatement->bindValue(':id',$id, PDO::PARAM_INT);

      //éxécution de la requête

      $executeIsOk = $this->pdoStatement->execute();

      if($executeIsOk){

        $language = $this->pdoStatement-> fetch();

        if($language===false){
            return null;
        }
        else{
            return $language;
        }

      }
      else{
          //erreur d'execution
          return false;
      }
  
      }


    

     /**
     * Récupère tous les objets Language de la bdd
     *
     * @return array|bool tableau d'objet Language ou un tableau vide s'il n'y a aucun objet dans la 
     * bdd, ou false si une erreur survient
     */
    public function readAll(){


        $this->pdoStatement = $this->pdo->query('SELECT * FROM language ORDER BY Name_language');

        //construction d'un tableau d'objet de type Language

        return $this->pdoStatement->fetchAll();

    }

    /**
     * recupère les codes avec les langages associés
     *
     * @return array|bool   tableau d'objet Language ou un tableau vide s'il n'y a aucun objet dans la 
     * bdd, ou false si une erreur survient
     */
    public function language($id){

        $this->pdoStatement =  $this->pdo->prepare('SELECT * FROM code
        INNER JOIN language
        ON language.ID_language = code.ID_language 
        INNER JOIN user
        ON code.ID_user = user.ID_user
        WHERE language.ID_language= :id ');

        //liaison des parametres

        $this->pdoStatement->bindValue(':id',$id, PDO::PARAM_INT);

        //éxécution de la requête

        $executeIsOk = $this->pdoStatement->execute();

        if($executeIsOk){

            $language = $this->pdoStatement-> fetchAll();

            if($language===false){
                return null;
            }
            else{
                return $language;
            }
        }
    }

}
