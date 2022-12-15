<?php 
//Data/BroodjesDAO.php
declare(strict_types =1);

namespace Data; 

use Entities\Broodjes; 
use \PDO;

class BroodjesDAO {

    public function getLijstBroodjes() : array 
    {
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8","root", "");
	    $sql = "SELECT id, naam, omschrijving, prijs FROM broodjes";
        $stmt = $dbh->prepare($sql);
	    $stmt->execute();	
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lijst = array();
        foreach ($resultSet as $rij) {
                $keuze = new Broodjes((int)$rij["id"], $rij["naam"], $rij["omschrijving"], (float) $rij["prijs"]);
                array_push($lijst, $keuze);
    	};
        $dbh = null;
        return $lijst; 
    }
}