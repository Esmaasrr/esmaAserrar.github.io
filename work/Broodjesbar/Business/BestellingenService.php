<?php
//Business/BestellingenService.php
declare(strict_types =1);

namespace Business; 

use Data\BestellingenDAO; 
use Data\KlantDAO; 

class BestellingenService {

    public function getBestelLijst(): array 
    {
        $bestellingDAO = new BestellingenDAO(); 
        $bestelLijst = $bestellingDAO->getBestelLijst();
        return $bestelLijst; 
    }

    public function updateBestelling (int $broodjeId, int $klantId, $afhalingsmoment, int $statusId)
    {
        $bestellingDAO = new BestellingenDAO(); 
        $updateBestelling = $bestellingDAO->Bestellingen((int) $broodjeId, (int) $klantId, $afhalingsmoment, (int) $statusId);
        return $updateBestelling; 
    }


    /*public function pasStatusAan(int $statusID, int $bestelID) 
    {
        $bestellingDAO = new BestellingenDAO(); 
        $updateStatus = $bestellingDAO->updateBestellingStatus((int)$statusID, (int) $bestelID) ;
        return $updateStatus;
    }*/

    public function bestellingGemaakt() : array
    {
        $bestellingDAO = new BestellingenDAO(); 
        $gemaakt = $bestellingDAO->getGemaakt(); 
        return $gemaakt; 
    }
    
    public function pasStatusAan(int $statusID, int $bestelID) 
    {
        $bestellingDAO = new BestellingenDAO(); 
        $bestellingDAO->updateBestellingStatus((int)$statusID, (int)$besteldID) ;
    }
}