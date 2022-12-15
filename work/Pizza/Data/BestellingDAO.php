<?php
//Data\BestellingDAO.php
declare(strict_types=1);

namespace Data; 

use Entities\Bestelling;
use Entities\Bestellijn;
use Entities\Pizza; 
use \PDO;

class BestellingDAO {

    public function voegBestellingToe(int $bestellijnId, int $klantId, $totaalprijs)
    {
        $sql = "insert into bestelling (klantId, bestellijnId, totaalprijs) values (:klantId, :bestellijnId, :totaalprijs)";
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$resultSet = $dbh->prepare($sql);
        $resultSet->execute(array(':bestellijnId' => $bestellijnId, ':klantId' => $klantId, ':totaalprijs' => $totaalprijs));	
	$bestellingId = $dbh->lastInsertId();
	$dbh = null;
        $bestelling = new Bestelling((int)$bestellingId, (int)$bestellijnId, (int) $klantId, (float) $totaalprijs);
	return $bestelling;
    }

    public function toonBestelling(): array 
    {
        $sql = "select bestelling.id, bestellijnId, klantId, totaalprijs, bestellijn.id, pizzaId, pizza.id, naam, informatie, prijs, promoprijs 
        from bestelling, bestellijn, pizza where (bestellijn.id = bestelling.bestellijnId) and (pizza.id = bestellijn.pizzaId)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
                $pizza = new Pizza((int)$rij["id"], $rij["naam"], $rij["informatie"], $rij["prijs"], $rij["promoprijs"]);
                $bestellijn = new Bestellijn((int)$id, $pizza);
                $bestelling = new Bestelling((int)$rij["id"], $bestellijn, (int)$rij["klantId"], $rij["totaalprijs"]);
        array_push($lijst, $bestelling);
        }
        $dbh = null;
        return $lijst;

    }

}