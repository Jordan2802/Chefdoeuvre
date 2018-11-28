<?php
namespace App\Tests;



/**
 * class qui va permettre de créer des utilisateurs 
 */
class User {


    /**
     * @var int     $ID_user     identifiant de l'utilisateur (généré auto par la bdd donc pas de setter)
     */

     private   $ID_user;
	
     /**
      *  @var string $Pseudo_user    pseudo de l'utilisateur
      */
     private   $Pseudo_user;

     /**
      *  @var string $Password_user     mot de passe de l'utilisateur 
      */
     private $Password_user;

     /** 
      * @var string $Mail_user      email de l'utilisateur 
      */
     private $Mail_user;

    /**
     * getter pour l'id de l'utilisateur
     *
     * @return int
     */
    public function getId()
    {
        return $this->ID_user;
    }

    /**
     * getter pour le pseudo de l'utilisateur
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->Pseudo_user;
    }

     /**
     * setter pour le pseudo de l'utilisateur
     *
     * @param string $Pseudo_user
     * @return User
     */
    public function setPseudo($Pseudo_user)
    {
        $this->Pseudo_user = $Pseudo_user;
        return $this;
    }

    /**
     * getter pour le mot de passe de l'utilisateur
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->Password_user;
    }

    /**
     * setter pour le mot de passe de l'utilisateur
     *
     * @param string $Password_user
     * @return User
     */
    public function setPassword($Password_user)
    {
        $this->Password_user = $Password_user;
        return $this;
    }

    /**
     * getter pour l'email de l'utilisateur
     *
     * @return string
     */
    public function getMail()
    {
        return $this->Mail_user;
    }

    /**
     * setter pour l'email de l'utilisateur
     *
     * @param string $Mail_user
     * @return User
     */
    public function setMail($Mail_user)
    {
        $this->Mail_user = $Mail_user;
        return $this;
    }
     

     
}


/**
 * test de la classe user avec PHPUnitTest
 */
class testUser extends \PHPUnit_Framework_TestCase {
    public function testCreateUser(){
        $testuser = new User();

        $testuser ->setPseudo('test');
        $this->assertNotNull($testuser->getPseudo());
        $this->assertNotEmpty($testuser->getPseudo());
    }


}