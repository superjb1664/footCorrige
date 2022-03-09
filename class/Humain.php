<?php

class Humain
{
    private string $nom;
    private string $prenom;
    private DateTime $dateNaissance;

    public function __construct(string $nom,string $prenom,DateTime $dateNaissance)
    {
        if ($nom == "")
            throw new Exception("Nom est vide");
        if ($prenom == "")
            throw new Exception("Prenom est vide");
        $this->SetNom($nom);
        //$this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    public function GetNom():string
    {
        return $this->nom;
    }
    public function SetNom(string $value)
    {
        if ($value == "")
            throw new Exception("Nom est vide");

        $this->nom = trim($value);
    }

    public function GetPrenom():string
    {
        return $this->prenom;
    }
    public function SetPrenom(string $value)
    {
        if ($value == "")
            throw new Exception("Prenom est vide");
        $this->prenom = $value;
    }

    public function GetDateNaissance():DateTime
    {
        return $this->dateNaissance;
    }
    public function SetDateNaissance(DateTime $value)
    {
        $this->dateNaissance = $value;
    }

    public function donneTexte() : string
    {
        return "$this->nom $this->prenom ". $this->dateNaissance->format("d M Y") ;
    }
}