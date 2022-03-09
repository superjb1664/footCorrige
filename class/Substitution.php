<?php

class Substitution extends Evenement
{
    private Joueur $entrant;
    private Joueur $sortant;

    public function __construct(DateTime $temps, Joueur $entrant, Joueur $sortant)
    {
        $this->entrant = $entrant;
        $this->sortant = $sortant;
        parent::__construct($temps);
    }

    public function donneTexte() : string{

        return "".$this->getTempsEnMinute()."' Entrant : ".$this->entrant->GetNom()." ".$this->entrant->GetPrenom()." , Sortant : ".$this->sortant->GetNom()." ".$this->sortant->GetPrenom();
    }

}