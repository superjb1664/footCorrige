<?php
use PHPUnit\Framework\TestCase;
class ArbitreTest extends TestCase
{
    public function testInit()
    {
        $unArbitre = new Arbitre ("Pitana","Nestor", new DateTime("1975-06-17"), "Argentin");
        $this->assertEquals("Pitana", $unArbitre->getNom(), "Erreur nom");
        $this->assertEquals("Nestor", $unArbitre->getPrenom(), "Erreur prenom");
        $this->assertEquals(new DateTime("1975-06-17"), $unArbitre->getDateNaissance(), "Erreur dateNaissance");
        $this->assertEquals("Argentin", $unArbitre->getPays(), "Erreur pays");
        $this->assertEquals('Pitana Nestor arbitre Argentin', $unArbitre->donneTexte(), "Erreur texte");
        return $unArbitre;
    }

    public function testExceptionPaysVide()
    {
        $this->expectExceptionMessage( "Pays est vide");
        $unArbitre = new Arbitre ("Pitana ","Nestor", new DateTime("1975-06-17"), "");

    }

    /**
     * @depends testInit
     */
    public function testExceptionChangePaysVide(Arbitre $unArbitre)
    {
        $this->expectExceptionMessage( "Pays est vide");
        $unArbitre->SetPays("");
    }

    /**
     * @depends testInit
     */
    public function testChangePays(Arbitre $unArbitre)
    {
        $unArbitre->setPays("ARGENTIN");
        $this->assertSame('ARGENTIN', $unArbitre->getPays(), "Erreur set pays");
        return $unArbitre;
    }


}