<?php

class Arbitre extends Humain
{
    private string $pays;


    /**
     * @throws Exception
     */
    public function __construct(string $nom, string $prenom, DateTime $dateNaissance, string $pays)
    {
        if($pays == "")
        {
            throw new Exception("Pays est vide");
        }
        $this->pays = $pays;

        parent::__construct($nom, $prenom, $dateNaissance);

    }

    public function GetPays():string
    {
        return $this->pays;
    }
    public function SetPays(string $value)
    {
        if ($value == "")
            throw new Exception("Pays est vide");
        $this->pays = $value;
    }

    public function donneTexte(): string
    {
        return $this->GetNom()." ".$this->GetPrenom()." arbitre ".$this->pays ;

    }


}