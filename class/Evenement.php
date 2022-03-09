<?php

class Evenement {

    private DateTime $temps;

    public function __construct(DateTime $temps)
    {
        $this->temps = $temps;
    }

    /**
     * @return DateTime
     */
    public function getTemps(): DateTime
    {
        return $this->temps;
    }

    public function getTempsEnMinute() : int
    {
        //var_dump($this->temps);
        $h = (int)$this->temps->format("H");
        $i = $this->temps->format("i");
        $nbMinutes = $h*60 + $i;
        return $nbMinutes;
    }

    public function donneTexte() : string{
        $nbSeconde = $this->temps->format("s");
        $temps = $this->getTempsEnMinute();
        return $temps.":".$nbSeconde;
    }
}