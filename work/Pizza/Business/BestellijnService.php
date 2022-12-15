<?php
//business/BestellijnService.php

declare(strict_types = 1);

namespace Business;

use Data\BestellijnDAO;

class BestellijnService {

    public function voegBestellijnenToe(int $pizzaId) 
    {
        $bestellijnDAO = new BestellijnDAO();
        $nieuwLijn = $bestellijnDAO->voegBestellijnToe((int) $pizzaId);
        return $nieuwLijn;
    }

public function getBestellijnen(): array 
{
    $bestellijnDAO = new BestellijnDAO();
    $bestellijnLijst = $bestellijnDAO->toonBestellijn();
    return $bestellijnLijst;
}

public function verwijderBestelLijn(int $id) 
{
    $bestellijnDAO = new BestellijnDAO(); 
    $verwijderLijn = $bestellijnDAO->deleteLijn((int) $id); 
    return $verwijderLijn;
}

public function verwijderBestelLijnen(): array
{
    $bestellijnDAO = new BestellijnDAO(); 
    $verwijderAlles = $bestellijnDAO->deleteLijnen();
    return $verwijderAlles;
}

}
