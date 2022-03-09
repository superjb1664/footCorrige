<?php

class Stade
{
    private string $nom;
    private Array $listeMatch;
    public function __construct(string $nom)
    {
        $this->nom = $nom;
        $this->listeMatch = [];
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function donneTexte() : string
    {
        return $this->nom;
    }

    /**
     * @note Ajoute un match à la collection de matchs ayant lieu dans ce stade
     * @param Match $match
     * @return : néant
     */
    public function ajouterMatch(Match $match)
    {
        $this->listeMatch[] = $match;
    }
}