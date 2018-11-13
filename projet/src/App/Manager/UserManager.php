<?php


/******************************************** */
namespace App\Manager;

use PDO;
use App\Entity\User;
use App\Manager\AllManager;


/****************************************** */



class UserManager extends AllManager {


      
    
    /**
     * insert un objet user dans la base de donnée et met à jour l'objet passé en argument en lui 
     * spécifiant un identifiant.
     *
     * @param User $user    objet de type User passé par référence.
     * @return bool true si l'objet a été inseré, false si une erreur survient
     */
    private function create(User &$user){

        $this->pdoStatement = $this->pdo->prepare('INSERT INTO user VALUES (NULL, :Pseudo_user, :Password_user, :Mail_user) ');

        //liaison des parametres

        $this->pdoStatement->bindValue(':Pseudo_user', $user->getPseudo(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':Password_user', $user->getPassword(), PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':Mail_user', $user->getMail(), PDO::PARAM_STR);

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

        $pdoStatement = $this->pdo->prepare('UPDATE user SET Pseudo_user=:Pseudo_user, Password_user=:Password_user, mail_user=:Mail_user WHERE ID_user=:id LIMIT 1');

        //liaison des parametres

        $pdoStatement->bindValue(':Pseudo_user', $user->getPseudo(), PDO::PARAM_STR);
        $pdoStatement->bindValue(':Password_user', $user->getPassword(), PDO::PARAM_STR);
        $pdoStatement->bindValue(':Mail_user', $user->getMail(), PDO::PARAM_STR);
        $pdoStatement->bindValue(':id', $user->getId(), PDO::PARAM_INT);

        //execution de la requete

        return $pdoStatement->execute();

    }

    /**
     * Supprime un objet stocké en bdd
     *
     * @param User $user objet de type User
     * @return bool true en cas de succès ou false en cas d'erreur
     */
    public function delete(User $user){
        
        $pdoStatement = $this->pdo->prepare('DELETE  FROM user WHERE ID_user = :id LIMIT 1');

        $pdoStatement->bindValue(':id', $user->getId(), PDO::PARAM_INT);

        //execution de la requete

        return $pdoStatement->execute();

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


/**
 * methode pour verifier si l'email existe dans la base de donnée
 *
 * @param string $mail
 * @return bool
 */
    public function verifMail($mail){

        $pdoStatement = $this->pdo->prepare('SELECT COUNT(*) FROM user WHERE Mail_user = :mail');
        $pdoStatement->execute(array(':mail'=>$mail));
        $mailExist = $pdoStatement->fetch()[0];
        if ($mailExist == 0) {
            return true;
        } else {
           return false;
        }

    }

 


    /**
     * methode pour vérifier si le pseudo existe dans la base de donnée
     *
     * @param string $pseudo
     * @return bool
     */
    public function verifPseudo($pseudo){

        $pdoStatement = $this->pdo->prepare('SELECT COUNT(*) FROM user WHERE Pseudo_user = :pseudo');
        $pdoStatement->execute(array(':pseudo'=>$pseudo));
        $pseudoExist = $pdoStatement->fetch()[0];
        if ($pseudoExist == 0) {
            return true;
        } else {
           return false;
        }

    }


    /**
     * méthode qui vérifie que l'utilisateur qui se connecte existe bien dans la base de donnée.
     * une session s'ouvre en cas de succes.
     *
     * @return void
     */
    public function login($pseudo){

        if(!empty($pseudo)){
            $pdoStatement = $this->pdo->prepare('SELECT * FROM user WHERE Pseudo_user = :pseudo');
            $pdoStatement->execute(array(':pseudo'=>$pseudo
                                                                   
                )
            );
            $count = $pdoStatement->rowCount();
            if($count>0){
                
                $_SESSION['pseudo'] = $pseudo;
               
                return $pdoStatement->fetch();
            }else{
                $message="false";
                echo $message;
            }
        }
    }


}