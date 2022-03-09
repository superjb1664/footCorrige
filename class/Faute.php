<?php

class Faute extends FaitDeJeu
{
    private ?Joueur $victime;
    private bool $cartonRouge;
    private bool $cartonJaune;
    private string $description;


    public function __construct(DateTime $temps, Joueur $auteur, bool $cartonJaune
        , bool $cartonRouge, string $description, ?Joueur $victime )
    {

        $this->cartonJaune = $cartonJaune;
        $this->cartonRouge = $cartonRouge;
        $this->description = $description;
        $this->victime = $victime;
        parent::__construct($temps, $auteur);
    }

    /**
     * @return Joueur
     */
    public function getVictime(): Joueur
    {
        return $this->victime;
    }

    /**
     * @return bool
     */
    public function isCartonRouge(): bool
    {
        return $this->cartonRouge;
    }

    /**
     * @return bool
     */
    public function isCartonJaune(): bool
    {
        return $this->cartonJaune;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function donneTexte(): string
    {
        $str = $this->getTempsEnMinute()."' : ";
        if($this->cartonJaune)
            $str .= "Carton jaune : ";
        if($this->cartonRouge)
            $str .= "Carton rouge : ";

        $str .= $this->getAuteur()->GetNom()." ".$this->getAuteur()->GetPrenom()." : ";

        if($this->victime != null)
        {
            $str .= "sur ".$this->victime->GetNom()." ".$this->victime->GetPrenom()." : ";
        }
        $str .= $this->description;

        return $str;
    }
}