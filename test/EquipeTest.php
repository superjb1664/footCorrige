<?php
use PHPUnit\Framework\TestCase;
class EquipeTest extends TestCase
{
    public function testEquipeVide()
    {
        $edf = new Equipe("France");
        //echo $edf->donneTexte(false);
        $this->assertEquals("Equipe : France", $edf->donneTexte(false), "Erreur nom equipe");

        return $edf;
    }

    public function testEquipeSelectionneurEtJoueur()
    {
        $edf = new Equipe("France");

        $this->assertEquals("Equipe : France", $edf->donneTexte(false), "Erreur nom equipe");
        $GO= new Joueur("Giroud","Olivier", new DateTime("1986-09-30"), 9, $edf);
        $DD= new Selectionneur("Deschamps","Didier", new DateTime("1969-08-15"),$edf);
        $this->assertEquals("Equipe : France\nSelectionneur : Deschamps Didier\nListe des joueurs : \nn°9 Giroud Olivier", $edf->donneTexte(true), "Erreur composition equipe");


        return $edf;
    }


}