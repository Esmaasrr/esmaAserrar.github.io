<?php
//Business/KlantenService.php
declare(strict_types = 1);

namespace Business;

use Data\KlantDAO; 

class KlantenService {
    public function klantToevoegen(string $voornaam, string $achternaam, string $email)
    {
        $klantenDAO = new KlantDAO(); 
        $updateKlant = $klantenDAO->updateKlant((string) $voornaam, (string) $achternaam, (string) $email);
        return $updateKlant; 
    }
}
