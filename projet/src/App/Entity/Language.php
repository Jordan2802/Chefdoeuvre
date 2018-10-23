<?php

namespace App\Entity;


/**
 * classe qui va permettre de créer des codes pour mettre dans la bdd
 */
class IntCode
{

    /**     
     * @var int    $ID_language correspond à l'id du langage utilisé dans la table language. 
     */
    private $ID_language;


    /**
     * @var string  $Name_Language correspond au nom du langage utilisé dans la table language.
     */
    private $Name_Language;


     /**
     * getter pour l'id
     *
     * @return int
     */
    public function getIdLanguage()
	{
		return $this->ID_language;
    }
    

    /**
     * getter pour le nom
     *
     * @return string
     */
    public function getNamelanguage()
	{
		return $this->Name_Language;
	}


    /**
     * setter pour le nom
     *
     * @param string $Name_Language
     * @return IntCode
     */
	public function setTitreCode($Name_Language)
	{
        $this->Name_Language = $Name_Language;
        return $this;
    }

}