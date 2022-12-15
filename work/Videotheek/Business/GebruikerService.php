<?php
//business/GebruikerService.php

declare(strict_types=1);

namespace Business; 

use Entities\Gebruiker;
use Data\GebruikerDAO;

class GebruikerService {

    public function createNewGebruiker($gebruikersnaam, $wachtwoord)
    {
        $gebruikerDAO = new GebruikerDAO();
        $nieuwGebruiker = $gebruikerDAO->nieuwGebruiker($gebruikersnaam, $wachtwoord);
        return $nieuwGebruiker;
    }
	
	//Adinda toegevoegd:
    public function controleerGebruiker($gebruikersnaam, $wachtwoord)
    {
        $gebruikerDAO = new GebruikerDAO();
        $nieuwGebruiker = $gebruikerDAO->controleerGebruiker($gebruikersnaam, $wachtwoord);
        return $nieuwGebruiker;
    }	

}