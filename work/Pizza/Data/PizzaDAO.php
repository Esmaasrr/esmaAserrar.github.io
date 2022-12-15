<?php
//data/PizzaDAO.php
declare(strict_types = 1);

namespace Data;

use Entities\Pizza;
use \PDO;

class PizzaDAO {

    public function getAllePizzas(): array 
    {
        $sql = "SELECT id, naam, informatie, prijs, promoprijs FROM `pizza`";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
        $pizza = new Pizza((int)$rij["id"], $rij["naam"], $rij["informatie"], (float)$rij["prijs"], (float)$rij["promoprijs"]);
        array_push($lijst, $pizza);
        }
        $dbh = null;
        return $lijst;
    }

    public function getById(int $id): array 
    {
        $sql = "select id, naam, informatie, prijs, promoprijs from pizza where id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $lijst = array();
        foreach ($stmt as $rij){
        $pizza = new Pizza((int)$rij["id"], $rij["naam"], $rij["informatie"], (float)$rij["prijs"], (float)$rij["promoprijs"]);
        array_push($lijst, $pizza);
        }
            $dbh = null; 
            return $lijst;
    }

}