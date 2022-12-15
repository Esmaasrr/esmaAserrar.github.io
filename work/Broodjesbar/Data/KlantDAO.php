<?php
//Data/KlantenDAO.php
declare(strict_types =1);

namespace Data;

use Entities\Klanten; 
use \PDO;

class KlantDAO {

    public function getLijstKlant() : array 
    {
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8","root", "");
	    $sql = "SELECT klantID, voornaam, achternaam, email FROM klanten";
        $stmt = $dbh->prepare($sql);
	    $stmt->execute();	
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lijst = array();
        foreach ($resultSet as $rij) {
                $keuze = new Klanten((int)$rij["klantID"], $rij["voornaam"], $rij["achternaam"], $rij["email"]);
                array_push($lijst, $keuze);
    	};
        $dbh = null;
        return $lijst; 
    }

    public function klantLijst() : array
    {
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8","root", "");
	    $sql = "SELECT id, naam, omschrijving, prijs FROM broodjes";
        $stmt = $dbh->prepare($sql);
	    $stmt->execute();	
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lijst = array();
        foreach ($resultSet as $rij) {
                $keuze = new Broodjes((int)$rij["id"], $rij["naam"], $rij["omschrijving"], $rij["prijs"]);
                array_push($lijst, $keuze);
    	};
        $dbh = null;
        return $lijst; 
    }

    public function updateKlant (string $voornaam, string $achternaam, string $email) : int
    {
        $sql = "insert into klanten (voornaam, achternaam, email) values (:voornaam,:achternaam, :email)";
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8", "root", "");
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':voornaam' => $voornaam,':achternaam' => $achternaam, ':email' => $email));
        $laatsteId = $dbh->lastInsertId();	
        $dbh = null;
        return (int)$laatsteId;
    }


}