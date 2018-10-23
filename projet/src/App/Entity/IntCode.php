<?php

namespace App\Entity;


/**
 * classe qui va permettre de créer des codes pour mettre dans la bdd
 */
class IntCode
{
    
    /** @var int $ID_code correspond au champs id de la table code */
    private $ID_code;

	

    /** @var string $Titre_code coreespond au champ titre de la table code */
    private $Titre_code;




    /** @var string $Desc_code correspond au champs description de la table code */
    private $Desc_code;




    /** @var string $CODE correspond au champs code dans la table code */
    private $CODE;


    /** @var int    $ID_CodeUser correspond au champs id_user dans la table code */
    private $ID_CodeUser;




    /**
     * getter pour l'id
     *
     * @return int
     */
    public function getIdCode()
	{
		return $this->ID_code;
    }
    

    /**
     * getter pour le titre
     *
     * @return string
     */
    public function getTitreCode()
	{
		return $this->Titre_code;
	}


    /**
     * setter pour le titre
     *
     * @param string $Titre_code
     * @return IntCode
     */
	public function setTitreCode($Titre_code)
	{
        $this->Titre_code = $Titre_code;
        return $this;
    }
    


    /**
     * getter pour la description
     *
     * @return string
     */
    public function getDescCode()
	{
		return $this->Desc_code;
	}



    /**
     * setter pour la description
     *
     * @param string $Desc_code
     * @return IntCode
     */
	public function setDescCode($Desc_code)
	{
        $this->Desc_code = $Desc_code;
        return $this;
    }
    

    /**
     * getter pour le code intégré
     *
     * @return string
     */
    public function getCode()
	{
		return $this->CODE;
	}



    /**
     * setter pour le code intégré
     *
     * @param string $CODE
     * @return IntCode
     */
	public function setCode($CODE)
	{
        $this->CODE = $CODE;
        return $this;
    }
    
    /**
     * getter pour l'id du code intégré
     *
     * @return string
     */
    public function getIdCodeUser()
	{
		return $this->ID_CodeUser;
    }
    
      /**
     * setter pour l'id du code intégré
     *
     * @param int $ID_CodeUser
     * @return IntCode
     */
	public function setIdCodeUser($ID_CodeUser)
	{
        $this->ID_CodeUser = $ID_CodeUser;
        return $this;
    }
}
