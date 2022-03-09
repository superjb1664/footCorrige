<?php

class Selectionneur extends Humain{

    private Equipe $entraine;

    public function __construct(string $nom, string $prenom, DateTime $dateNaissance, Equipe $entraine )
    {
        $this->entraine = $entraine;


        parent::__construct($nom, $prenom, $dateNaissance);
        $entraine->setSelectionneur($this);
    }

    /**
     * @return Equipe
     */
    public function getEquipe(): Equipe
    {
        return $this->entraine;
    }

}