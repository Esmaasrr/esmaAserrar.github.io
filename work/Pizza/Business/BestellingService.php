<?php
//Business/BestellingService.php
declare(strict_types = 1);

namespace Business;

use Data\BestellingDAO;

class BestellingService {

    public function nieuwBestelling(int $klantId, int $bestellijnId, float $totaalprijs)
    {
        $bestellingDAO = new BestellingDAO();
        $nieuweBestelling = $bestellingDAO->voegBestellingToe((int) $bestellijnId, (int) $klantId, $totaalprijs);
    }

    public function geheleBestelling(): array
    {
        $bestellingDAO = new BestellingDAO();
        $eindBestelling = $bestellingDAO->toonBestelling();
        return $eindBestelling;
    }
}