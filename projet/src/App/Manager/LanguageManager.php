<?php


/******************************************** */
namespace App\Manager;

use PDO;

use App\Entity\Language;
use App\Manager\AllManager;


/****************************************** */



class LanguageManager extends AllManager{


    


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


    /**
     * méthode qui permet de faire une recherche par titre de code.
     *
     * @param string $search
     * @return bool
     */
    public function search($search){

        $this->pdoStatement =  $this->pdo->query('SELECT * FROM code
        INNER JOIN language
        ON language.ID_language = code.ID_language 
        INNER JOIN user
        ON code.ID_user = user.ID_user
        WHERE Titre_code LIKE  "%'.$search.'%" ');

        return $this->pdoStatement->fetchAll();
    }

}
