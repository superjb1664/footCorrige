<?php

class Joueur extends Humain
{
    private int $numeroMaillot;
    private Equipe $jouePour;

    public function __construct(string $nom, string $prenom, DateTime $dateNaissance, int $numeroMaillot, Equipe $equipe )
    {
        $this->numeroMaillot = $numeroMaillot;
        $this->jouePour = $equipe;


        parent::__construct($nom, $prenom, $dateNaissance);
        $equipe->AjouterJoueur($this);
    }

    /**
     * @return int
     */
    public function getNumeroMaillot(): int
    {
        return $this->numeroMaillot;
    }

    /**
     * @param int $numeroMaillot
     */
    public function setNumeroMaillot(int $numeroMaillot): void
    {
        $this->numeroMaillot = $numeroMaillot;
    }

    /**
     * @return Equipe
     */
    public function getEquipe(): Equipe
    {
        return $this->jouePour;
    }

    public function donneTexte():string
    {
        return "n°".$this->numeroMaillot." ".$this->GetNom()." ".$this->GetPrenom();
    }
}