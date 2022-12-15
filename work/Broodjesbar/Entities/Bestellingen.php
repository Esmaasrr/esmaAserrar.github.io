<?php
//Entities/Bestellingen.php
declare(strict_Types = 1);

namespace Entities; 

class Bestellingen
{
    private int $bestelID;
    private Broodjes $broodje;
	private Klanten $klant;
    private string $afhalingsmoment;
	private Statussen $status;

    public function __construct(int $bestelID, Broodjes $broodje, Klanten $klant, string $afhalingsmoment, Statussen $status)
    {
        $this->bestelID = $bestelID;
        $this->broodje = $broodje;
        $this->klant = $klant;
        $this->afhalingsmoment = $afhalingsmoment;
		$this->status = $status;
    }

    public function getBestelID() : int
    {
        return $this->bestelID;
    }

    public function getBroodjeObject() : Broodjes
    {
        return $this->broodje;
    }

    public function getKlantObject() : Klanten
    {
        return $this->klant;
    }

    public function getAfhalingsmoment() : int
    {
        return $this->afhalingsmoment;
    }

    public function getStatusObject() : Statussen
    {
        return $this->status;
    }	
}