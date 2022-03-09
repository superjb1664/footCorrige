<?php

use PHPUnit\Framework\TestCase;


class HumainTest extends TestCase
{
    public function testInit()
    {
        $giroud = new Humain("Giroud", "Olivier", new DateTime("1986-09-30"));
        $this->assertEquals("Giroud", $giroud->getNom(), "Erreur nom");
        $this->assertEquals("Olivier", $giroud->getPrenom(), "Erreur prenom");
        $this->assertEquals(new DateTime("1986-09-30"), $giroud->getDateNaissance(), "Erreur dateNaissance");


        return $giroud;
    }


    public function testExceptionNomVide()
    {
        $this->expectExceptionMessage( "Nom est vide");
        $vide = new Humain("","",new DateTime("11/11/11"));
    }

    public function testExceptionPrenomVide()
    {
        $this->expectExceptionMessage( "Prenom est vide");
        $vide = new Humain("Messi","",new DateTime("11/11/11"));
    }

    /**
     * @depends testInit
     */
    public function testChangeNomComposeEspace(Humain $giroud)
    {
        $giroud->setNom(" Nasser Edin ");
        $this->assertSame('Nasser Edin', $giroud->getNom(), "Erreur nom");
        return $giroud;
    }

    /**
     * @depends testInit
     */
    public function testChangeNom(Humain $giroud)
    {
        $giroud->setNom("GIROUD");
        $this->assertSame('GIROUD', $giroud->getNom(), "Erreur nom");
        return $giroud;
    }

    /**
     * @depends testInit
     */
    public function testChangePrenom(Humain $giroud)
    {
        $giroud->setPrenom("OLIVIER");
        $this->assertSame('OLIVIER', $giroud->getPrenom(), "Erreur prénom");

        return $giroud;
    }

    /**
     * @depends testInit
     */
    public function testExceptionChangeNomVide(Humain $giroud)
    {
        $this->expectExceptionMessage( "Nom est vide");
        $giroud->SetNom("");

    }

    /**
     * @depends testInit
     */
    public function testExceptionChangePrenomVide(Humain $giroud)
    {
        $this->expectExceptionMessage( "Prenom est vide");
        $giroud->SetPrenom("");
    }
}