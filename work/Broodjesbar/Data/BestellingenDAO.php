<?php
//Data/BestellingenDAO.php
declare(strict_types =1);

namespace Data;

use Entities\Bestellingen;
use Entities\Klanten;
use Entities\Statussen;
use Entities\Broodjes;
use \PDO;

class BestellingenDAO {

    public function getBestelLijst() : array
    {
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8","root", "");
	    //$sql = "select bestelID, voornaam, naam, status, afhalingsmoment from broodjes, statussen, klanten, bestellingen where (bestellingen.klantID = klanten.klantID) and (bestellingen.statusID = statussen.statusID) and (bestellingen.broodjeID = broodjes.ID) and (bestellingen.statusID = 1) order by afhalingsmoment";
// Adinda aangepast: toon alle bestellingen die besteld en gemaakt zijn (de broodjes die afgehaald zijn tonen we niet meer in het overzicht) -> ... and (bestellingen.statusID <> 3)
$sql = "select bestelID, broodjes.id, broodjes.naam, broodjes.omschrijving, broodjes.prijs, klanten.klantID, voornaam, achternaam, email, statussen.statusID, status, afhalingsmoment from broodjes, statussen, klanten, bestellingen where (bestellingen.klantID = klanten.klantID) and (bestellingen.statusID = statussen.statusID) and (bestellingen.broodjeID = broodjes.ID) and (bestellingen.statusID <> 3) order by status";		
        $stmt = $dbh->prepare($sql);
	    $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lijst = array();
        foreach ($resultSet as $rij) {
                //$bestellingenB = $rij["bestelID"] . " - " . $rij["voornaam"] . " - " . $rij["naam"] . " - " . $rij["afhalingsmoment"];
			//Adinda aangepast, toon ook nog de status
			$broodje = new Broodjes((int) $rij["id"], $rij["naam"], $rij["omschrijving"], (float) $rij["prijs"]);
			$klant = new Klanten((int) $rij["klantID"], $rij["voornaam"], $rij["achternaam"], $rij["email"]);
			$status = new Statussen((int) $rij["statusID"], $rij["status"]);
            $bestellingenB = new Bestellingen((int) $rij["bestelID"], $broodje, $klant, $rij["afhalingsmoment"], $status);
                array_push($lijst, $bestellingenB);
    	};
        $dbh = null;
        return $lijst; 
        
    }

    public function Bestellingen (int $broodjeId, int $klantId, $afhalingsmoment, int $statusId)
    {
        /*
        echo "<h1>public function Bestellingen</h1>";
        echo "<h1>broodjeid: {$broodjeId}, afhalingsmoment: {$afhalingsmoment}</h1>";
        */
        //$sql = "insert into bestellingen (broodjeId, afhalingsmoment, statusId) values (:broodjeId, :afhalingsmoment, :statusId)";
        // Adinda: een bestelling-record heeft deze info nodig: bestelid (wordt automatisch aangemaakt via insert), broodjeid, klantid, afhalingsmoment, statusid 
        $sql = "insert into bestellingen (broodjeId, klantId, afhalingsmoment, statusId) values (:broodjeId, :klantId, :afhalingsmoment, :statusId)";
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8", "root", "");
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':broodjeId' => $broodjeId, ':klantId' => $klantId, ':afhalingsmoment' => $afhalingsmoment, ':statusId' => $statusId));
        $dbh = null;
    }

    public function updateBestellingStatus(int $statusID, int $bestelID)	// geef het bestelid door en de status die het moet worden
    {
        $sql = "update bestellingen set statusID = :statusID where bestelID = :bestelID";
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8", "root","");
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':statusID' => $statusID, ':bestelID' => $bestelID));	
        $dbh = null;
    }

    public function getGemaakt() : array
    {
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8","root", "");
	    $sql = "select bestelID, voornaam, naam, status, afhalingsmoment from broodjes, statussen, klanten, bestellingen where (bestellingen.klantID = klanten.klantID) 
        and (bestellingen.statusID = statussen.statusID) and (bestellingen.broodjeID = broodjes.ID) and (bestellingen.statusID = 2) order by afhalingsmoment";
        $stmt = $dbh->prepare($sql);
	    $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lijst = array();
        foreach ($resultSet as $rij) {
                $bestellingenG = $rij["bestelID"] . " - " . $rij["voornaam"] . " - " . $rij["naam"] . " - " . $rij["afhalingsmoment"];
                array_push($lijst, $bestellingenG);
    	};
        $dbh = null;
        return $lijst; 
    }

    public function deleteBestelling(int $bestelID)
    {
        $sql = "delete from bestellingen where bestelID = :bestelID";
        $dbh = new PDO(
            "mysql:host=localhost;dbname=broodjesbar;charset=utf8",
            "root","");

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':bestelID' => $bestelID
        ));
        $dbh = null;
    }

}