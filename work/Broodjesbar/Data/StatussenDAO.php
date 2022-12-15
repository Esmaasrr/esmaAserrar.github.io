<?php
//Data/StatussenDAO.php
declare(strict_types = 1);

namespace Data; 

use Entities\Statussen; 
use \PDO;

class StatussenDAO {
    public function getLijstStatus() : array 
    {
        $dbh = new PDO("mysql:host=localhost;dbname=broodjesbar;charset=utf8","root", "");
	    $sql = "SELECT statusID, Status FROM statussen";
        $stmt = $dbh->prepare($sql);
	    $stmt->execute();	
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lijst = array();
        foreach ($resultSet as $rij) {
                $keuze = new Statussen((int)$rij["statusID"], $rij["Status"]);
                array_push($lijst, $keuze);
    	};
        $dbh = null;
        return $lijst; 
    }
}