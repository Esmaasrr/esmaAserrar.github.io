<?php
//business/KlantService.php

declare(strict_types = 1);

namespace Business;

use Data\KlantDAO;

class KlantService {

public function klantToevoegen(string $naam, string $voornaam, string $straat, int $nummer, int $postId, string $email, string $wachtwoord, int $aanmerkingspromo) 
{
	
    $klantDAO = new klantDAO();
    $nieuwKlant = $klantDAO->voegKlantToe($naam, $voornaam, $straat, (int) $nummer, (int) $postId, $email, $wachtwoord, (int) $aanmerkingspromo);
    return $nieuwKlant;
}

public function bestaatKlant(string $email)
{
    $klantDAO = new KlantDAO();
    $klantBestaat = $klantDAO->getById($email);
    return $klantBestaat;
}

public function updateAdres(int $id, string $straat, int $nummer, int $postId)
{
    $klantDAO = new KlantDAO(); 
    $veranderAdres = $klantDAO->updateKlant((int) $id, $straat, (int)$nummer, (int)$postId);
    return $veranderAdres;
}
	
public function getKlantById(int $id)
{
    $klantDAO = new KlantDAO();
    $klant = $klantDAO->getKlantById($id);
    return $klant;
}	

}
