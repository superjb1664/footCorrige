<?php

class But extends FaitDeJeu
{
    private bool $surPenalty;
    private Equipe $auProfitDe;

    public function __construct(DateTime $temps, Joueur $auteur, bool $surPenalty, Equipe $auProfitDe)
    {
        $this->auProfitDe = $auProfitDe;
        $this->surPenalty = $surPenalty;
        parent::__construct($temps, $auteur);
    }

    public function donneTexte(): string
    {
        $str = "{$this->getTempsEnMinute()}' : but pour {$this->auProfitDe->getPays()} - {$this->getAuteur()->GetNom()} {$this->getAuteur()->GetPrenom()}";

        if($this->surPenalty)
        {
            $str .= " (Penalty)";
        }

        if($this->getAuteur()->getEquipe() !== $this->auProfitDe)
        {
            $str .= " (CSC)";
        }
        return $str;
    }

    /**
     * @return Equipe
     */
    public function getAuProfitDe(): Equipe
    {
        return $this->auProfitDe;
    }
}