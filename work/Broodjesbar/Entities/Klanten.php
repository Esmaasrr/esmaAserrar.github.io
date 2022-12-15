<?php
//Entities/Klant.php
declare(strict_types =1);

namespace Entities; 

class Klanten
{
    private int $klantId;
    private string $voornaam;
    private string $achternaam;
    private string $email;

    public function __construct(int $klantId, string $voornaam, string $achternaam, string $email)
    {
        $this->klantId = $klantId;
        $this->voornaam = $voornaam;
        $this->achternaam = $achternaam;
        $this->email = $email;
    }

    public function getKlantId() : int
    {
        return $this->klantId;
    }

    public function getVoornaam() : string
    {
        return $this->voornaam;
    }

    public function getAchternaam() : string
    {
        return $this->achternaam;
    }

    public function getEmail() : string
    {
        return $this->email;
    }
}