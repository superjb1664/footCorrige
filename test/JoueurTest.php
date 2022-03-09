<?php

use PHPUnit\Framework\TestCase;


class JoueurTest extends TestCase
{

    public function testInit()
    {
        $edf = new Equipe("France");
        $GO= new Joueur("Giroud","Olivier", new DateTime("1986-09-30"), 9, $edf);
        $this->assertEquals("n°9 Giroud Olivier", $GO->donneTexte(false), "Erreur donneTexteJoueur");
        return $GO;
    }
}