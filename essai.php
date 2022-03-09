<?php
require_once "vendor/autoload.php";

$edf = new Equipe("France");

$GO= new Joueur("Giroud","Olivier", new DateTime("1986-09-30"), 9, $edf);

$DD= new Selectionneur("Deschamps","Didier", new DateTime("1969-08-15"),$edf);

$MK= new Joueur("MBappé","Kylian", new DateTime("1998-12-20"), 10, $edf);

$dt =  DateTime::createFromFormat("i:s", "08:00");
$event = new Evenement($dt );

echo "\n".$event->donneTexte()."\n";

//    Résultat dans la console :

//        8:00

$NF= new Joueur("Fekir","Nabil ", new DateTime("1993-06-18"), 10, $edf);

$sub = new Substitution (new DateTime("01:21:00"), $NF, $GO);

echo $sub->donneTexte()."\n";

$KN = new Joueur("Kante","NGolo", new DateTime("1991-03-29"), 13, $edf);

$ft1 = new Faute(new DateTime("0:27:00"), $KN, true, false, "mauvais geste" , null);
echo $ft1->donneTexte()."\n";
//    Résultat dans la console :

//        27' : Carton jaune : Ngole Kanté : Mauvais geste

$cro = new Equipe ("Croatie");

$CRPI= new Joueur("Perisic","Ivan", new DateTime("1900-01-01"),  4, $cro);

$ft2 = new Faute(new DateTime("0:27:00"), $KN,true, false, "mauvais geste",  $CRPI);

echo $ft2->donneTexte()."\n";

echo $ft2->donneTexte()."\n";

//    Résultat dans la console :

//        27' : Carton jaune : Ngole Kanté sur Perisic Ivan : Mauvais geste

$HL = new Joueur("Hernandez","Lucas", new DateTime("1900-01-01"), 21, $edf);

$CRML = new Joueur("Modric","Luca", new DateTime("1900-01-01"),  10, $cro);

$ft3 = new Faute(new DateTime("00:03:00"), $CRML ,false, false, "très très mauvais geste de futur rageux",  $HL );

echo $ft3->donneTexte()."\n";

$stade = new Stade ("Luzhniki Arena (Moscou)");

echo $stade->donneTexte()."\n";

//    Résultat dans la console :

//        Luzhniki Arena (Moscou)

$CRMM = new Joueur("Mandzukic","Mario", new DateTime("1900-01-01"),  17, $cro);

$bt = new But( new DateTime("0:18:00"), $CRMM,false,  $edf );

echo $bt->donneTexte()."\n";

$GA = new Joueur("Griezmann","Antoine", new DateTime("1900-01-01"), 7, $edf);

$bt2 = new But( new DateTime("00:38:00"), $GA, true, $edf );

echo $bt2->donneTexte()."\n";