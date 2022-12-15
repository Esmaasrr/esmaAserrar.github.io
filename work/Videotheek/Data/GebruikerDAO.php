<?php
//data/GebruikerDAO.php

declare(strict_types=1);

namespace Data; 

use Entities\Gebruiker;
use \PDO;


class GebruikerDAO {

    public function nieuwGebruiker(string $gebruikersnaam, string $wachtwoord) 
    {
        $sql = 'insert into gebruikers (gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam, :wachtwoord)';
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);

        $stmt->execute(array(':gebruikersnaam' => $gebruikersnaam, 'wachtwoord' => $wachtwoord));
        $lastId = $dbh->lastInsertId();
        $dbh = null;
        $gebruiker = new Gebruiker((int)$lastId, $gebruikersnaam, $wachtwoord);
        return $gebruiker;
    }
	
	//Adinda toegevoegd
    public function controleerGebruiker(string $gebruikersnaam, string $wachtwoord) 
    {
		$maginloggen = false;
        $sql = 'select * from gebruikers where gebruikersnaam = :gebruikersnaam and wachtwoord = :wachtwoord';
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);

        $stmt->execute(array(':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $wachtwoord));
		$row = $stmt->fetch(\PDO::FETCH_ASSOC);
		if ($row) {
			$maginloggen = true;
		}
        $dbh = null;
        return $maginloggen;
    }	

}