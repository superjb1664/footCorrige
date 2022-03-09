<?php
class FaitDeJeu extends Evenement {

    private Joueur $auteur;

    public function __construct(DateTime $temps, Joueur $auteur)
    {
        $this->auteur = $auteur;
        parent::__construct($temps);
    }

    /**
     * @return Joueur
     */
    public function getAuteur(): Joueur
    {
        return $this->auteur;
    }
}