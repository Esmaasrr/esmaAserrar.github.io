<?php
//data/PostcodeDAO.php
declare(strict_types = 1);

namespace Data;

use Entities\Postcode;
use \PDO;

class PostcodeDAO {

    public function getAllePostcodes(): array
    {
        $sql = "SELECT id, postcode, plaats, isLeverbaar FROM postcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
        $postcode = new Postcode((int)$rij["id"], (int)$rij["postcode"], (string) $rij["plaats"], (int)$rij["isLeverbaar"]);
        array_push($lijst, $postcode);
        }
        $dbh = null;
        return $lijst;
    }

    public function voegPostcodeToe(int $postcode, $plaats, int $isLeverbaar)
    {
        $bestaandPostcode = $this->getById((int)$postcode);

        if (!is_null($bestaandPostcode))
        {
            return $bestaandPostcode;
        }

            $sql = "insert into postcode (postcode, plaats, isLeverbaar) values (:postcode, :plaats, :isLeverbaar)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->prepare($sql);
            $resultSet->execute(array(':postcode' => $postcode, ':plaats' => $plaats, ':isLeverbaar' => $isLeverbaar));	
            $dbh = null; 
        } 
            
        
    

    public function getById(int $postcode): ?Postcode {
        $sql = "SELECT id, postcode, plaats, isLeverbaar FROM postcode where postcode = :postcode";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':postcode' => $postcode));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
           if (!$rij) {
           return null;
           } else {
           $postcode = new Postcode((int)$rij["id"], $rij["postcode"], $rij["plaats"], $rij["isLeverbaar"]);
           $dbh = null;
       return $postcode;
                }
                   }


    
    public function controleLevering (int $id) 
{
var_dump($id);		
    //$sql = "select id, postcode, plaats, isLeverbaar from postcode where isLeverbaar = :isLeverbaar and id = :id";
		$sql = "select id, postcode, plaats, isLeverbaar from postcode where id = :id";
    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        //$stmt->execute(array(':isLeverbaar' => 1, ':id' => $id));
		$stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($rij['isLeverbaar']);		
		if ($rij['isLeverbaar'] == 1) {return true;}
		else {return false;}
		/*
        if (!$rij) {
            return null;
            } else {
           $postcode = new Postcode((int)$rij["id"], (int)$rij["postcode"], (string) $rij["plaats"], (int)$rij["isLeverbaar"]);
           $dbh = null;
       return $postcode;}
		*/
} 

}