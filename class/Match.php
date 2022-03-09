<?php

class Match
{
    private DateTime $horaire;
    private Array $listeRemplacements;
    private Array $listeTitulaire;
    private Equipe $equipeDomicile;
    private Equipe $equipeExterieure;
    private Arbitre $arbitre;
    private Stade $stadeMatch;
    private Array $listeButs;
    private Array $listeFautes;

    public function __construct(DateTime $horaire, Equipe $equipeDomicile,
                                Equipe $equipeExterieure, Arbitre $arbitre,
                                Stade $stade, Array $listeTitulaire)
    {
        $this->horaire = $horaire;
        $this->equipeDomicile = $equipeDomicile;
        $this->equipeExterieure = $equipeExterieure;
        $this->arbitre = $arbitre;
        $this->stadeMatch = $stade;
        $this->listeTitulaire = $listeTitulaire;
        $this->listeRemplacements = [];
        $this->listeButs = [];
        $this->listeFautes = [];
    }

    public function ajouterSubstitution(DateTime $temps, Joueur $entrant,
                                        Joueur $sortant)
    {
        $nvSubstitution = new Substitution($temps,$entrant, $sortant);
        $this->listeRemplacements[] = $nvSubstitution;
    }

    public function ajouterFaute(bool $estJaune, bool $estRouge,
                                 string $description, DateTime $temps,
    Joueur $auteur, ?Joueur $victime)
    {
        $nvFaute = new Faute($temps,$auteur,$estJaune,$estRouge,$description,$victime);
        $this->listeFautes[] = $nvFaute;
    }

    public function ajouterBut(DateTime $temps, bool $estPenalty,
        Joueur $auteur, Equipe $equipePour)
    {
        $nvBut = new But($temps, $auteur, $estPenalty, $equipePour);
        $this->listeButs[] = $nvBut;
    }

    public function donnerScoreEquipeDomicile() : int
    {
        $score = 0;
        foreach($this->listeButs as $but)
        {
            if($but->getAuProfitDe() === $this->equipeDomicile)
                $score++;
        }
        return $score;
    }

    public function donnerScoreEquipeExterieure() : int
    {
        $score = 0;
        foreach($this->listeButs as $but)
        {
            if($but->getAuProfitDe() === $this->equipeExterieure)
                $score++;
        }
        return $score;
    }

    public function donneTexte(bool $developper) : string
    {
        $str = "";
        //    Résultat dans la console :

        $str .= "Equipe domicile : {$this->equipeDomicile->getPays()}\n";

        $str .= "Sélectionneur : {$this->equipeDomicile->getEstEntrainee()->GetPrenom()} {$this->equipeDomicile->getEstEntrainee()->GetNom()}\n";
        $str .= "Titulaires: \n";

        foreach($this->listeTitulaire as $joueur)
        {
            if($joueur->getEquipe() === $this->equipeDomicile)
            {
                $str .=  "{$joueur->getNumeroMaillot()} {$joueur->getNom()} {$joueur->getPrenom()}\n";
            }
        }

        $str .= "Remplaçants: \n";
        foreach($this->equipeDomicile->getListeJoueurs() as $joueur)
        {
            if(!in_array($joueur,$this->listeTitulaire))
            {
                $str .=  "{$joueur->getNumeroMaillot()} {$joueur->getNom()} {$joueur->getPrenom()}\n";
            }
        }

        $str .= "Equipe exterieure : {$this->equipeExterieure->getPays()}\n";

        $str .= "Sélectionneur : {$this->equipeExterieure->getEstEntrainee()->GetPrenom()} {$this->equipeDomicile->getEstEntrainee()->GetNom()}\n";
        $str .= "Titulaires: \n";

        foreach($this->listeTitulaire as $joueur)
        {
            if($joueur->getEquipe() === $this->equipeExterieure)
            {
                $str .=  "{$joueur->getNumeroMaillot()} {$joueur->getNom()} {$joueur->getPrenom()}\n";
            }
        }

        $str .= "Remplaçants: \n";
        foreach($this->equipeExterieure->getListeJoueurs() as $joueur)
        {
            if(!in_array($joueur,$this->listeTitulaire))
            {
                $str .=  "{$joueur->getNumeroMaillot()} {$joueur->getNom()} {$joueur->getPrenom()}\n";
            }
        }

        $str .= "Faits de jeu : \n";

        foreach ($this->listeButs as $but)
        {
            $str .= $but->donneTexte()."\n";
        }

//       18' : but pour France - Mandzukic Mario (CSC)

//       28' : but pour Croatie - Perisic I

//       38' : but pour France - Griezmann A (Penalty)

//       59' : but pour France - Pogba P

//       65' : but pour France - Mbappé K

//       69' : but pour Croatie - Manzukic M
        return $str;
    }
}