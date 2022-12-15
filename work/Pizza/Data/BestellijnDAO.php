<?php
//data/BestellijnDAO.php
declare(strict_types = 1);

namespace Data;

use Entities\Pizza;
use Entities\Bestellijn;
use Entities\Winkelmand;
use \PDO; 

class BestellijnDAO {

    public function voegBestellijnToe(int $pizzaId)
    {
        $sql = "insert into bestellijn (pizzaId) values (:pizzaId)";
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$resultSet = $dbh->prepare($sql);
        $resultSet->execute(array(':pizzaId' => $pizzaId));	
	$bestellijnId = $dbh->lastInsertId();
	$dbh = null;
        $bestellijn = new Bestellijn((int)$bestellijnId, (int)$pizzaId);
	return $bestellijn;
    }

    public function toonBestellijn(): array
    {
        $sql = "select bestellijn.id, pizzaId, naam, informatie, prijs, promoprijs from bestellijn join pizza on pizza.id = pizzaId;";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
        $pizza = new Winkelmand((int)$rij["id"], (int)$rij["pizzaId"], $rij["naam"],  $rij["informatie"], (float)$rij["prijs"], (float)$rij["promoprijs"]);
        array_push($lijst, $pizza);
        }
        $dbh = null;
        return $lijst;
    }

    public function deleteLijn (int $id) {
        $sql = "delete from bestellijn where id = :id" ;
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
             $stmt->execute(array(':id' => $id));
            $dbh = null;
    }

    public function deleteLijnen (): array {
        $sql = "delete from bestellijn" ;
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->query($sql);
            $lijst = array();
            foreach ($stmt as $rij){
                $bestellijn = new Bestellijn((int)$id, (int)$pizzaId);
            array_push($lijst, $bestellijn);
            }
            $dbh = null;
            return $lijst;
    }

}