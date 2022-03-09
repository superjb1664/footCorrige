<?php

class Equipe
{
    private string $pays;
    private array $listeJoueurs;
    private Selectionneur $estEntrainee;


    public function __construct(string $pays)
    {
        $this->pays = $pays;
        $this->listeJoueurs = [];
    }

    /**
     * @return string
     */
    public function getPays(): string
    {
        return $this->pays;
    }

    /**
     * @param $joueur : joueur à ajouter à l'équipe
     */
    public function AjouterJoueur(Joueur $joueur)
    {
        $this->listeJoueurs[] = $joueur;
    }

    /**
     * @return le selectionneur de l'équipe !!
     */
    public function getEstEntrainee():Selectionneur
    {
        return $this->estEntrainee;
    }

    /**
     * @note Change le sélectionneur de l'équipe !
     * @param Selectionneur $estEntrainée
     */
    public function setSelectionneur(Selectionneur $estEntrainee): void
    {
        $this->estEntrainee = $estEntrainee;
    }

    /**
     * @return array
     */
    public function getListeJoueurs(): array
    {
        return $this->listeJoueurs;
    }

    public function donneTexte(bool $etat):string{
        if($etat == false)
        {
            return "Equipe : ".$this->pays;
        }
        else
        {
            $str ="Equipe : ".$this->pays;
            $str .="\nSelectionneur : ".$this->estEntrainee->GetNom()." ".$this->estEntrainee->GetPrenom();
            if(count($this->listeJoueurs) >= 1)
            {
                $str .= "\nListe des joueurs : ";
                foreach($this->listeJoueurs as $joueur)
                {
                     $str .= "\n".$joueur->donneTexte();
                }
            }
            return $str;
        }
    }

}