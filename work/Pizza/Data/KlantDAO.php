<?php
//data/KlantDAO.php
declare(strict_types = 1);

namespace Data;

use Entities\Klant;
use Entities\Postcode;
use Exception\BestaatException;

use \PDO;

class KlantDAO {

    public function klantGegevens(): array{
        $sql = "SELECT * FROM `klant` WHERE id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
            $klant = new Klant((int)$rij["id"], $rij["naam"], $rij["voornaam"], $rij["straat"], (int)$rij["nummer"], (int)$rij["postId"], $rij["email"], $rij["wachtwoord"], (int)$rij["aanmerkingspromo"]);
        array_push($lijst, $klant);
        }
        $dbh = null;
        return $lijst;
    }
	
	
    public function getKlantById(int $id) {
        $sql = "SELECT * FROM `klant` WHERE id = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            $klant = new Klant((int)$rij["id"], $rij["naam"], $rij["voornaam"], $rij["straat"], (int)$rij["nummer"], (int)$rij["postId"], $rij["email"], $rij["wachtwoord"], (int)$rij["aanmerkingspromo"]);
        $dbh = null;
        return $klant;
    }
	
	

    public function updateKlant(int $id, string $straat, int $nummer, int $postId) 
    {

        $sql = "update klant set straat = :straat, nummer = :nummer, postId = :postId where id = :id";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':id' => $id, ':straat' => $straat, ':nummer' => $nummer, ':postId' => $postId));
		/*
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$rij) {
                return null;
                } else {
                $klant = new Klant((int)$rij["id"], $rij["naam"], $rij["voornaam"], $rij["straat"], (int)$rij["nummer"], (int)$rij["postId"], $rij["email"], $rij["wachtwoord"], (int)$rij["aanmerkingspromo"]);
                $dbh = null;
            return $klant;
                }
		*/
           $dbh = null;
    }


    public function voegKlantToe(string $naam, string $voornaam, string $straat, int $nummer, int $postId, string $email, string $wachtwoord, int $aanmerkingspromo)
    {
		/*
$row = $this->getById($email);
if (!is_null($row)) {return $row;}
		*/
	echo "++++++++++++++";	
echo $naam.' | '. $voornaam .' | '. $straat .' | '. $nummer .' | '. $postId .' | '. $email .' | '. $wachtwoord .' | '. $aanmerkingspromo;		

        $sql = "insert into klant (naam, voornaam, straat, nummer, postId, email, wachtwoord, aanmerkingspromo) 
                values (:naam, :voornaam, :straat, :nummer, :postId, :email, :wachtwoord, :aanmerkingspromo)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->prepare($sql);
            $resultSet->execute(array(':naam' => $naam, ':voornaam' => $voornaam, ':straat' => $straat, 
                                        ':nummer' => $nummer, ':postId' => $postId, ':email' => $email, 
                                        ':wachtwoord' => $wachtwoord, ':aanmerkingspromo' => $aanmerkingspromo));
		
		$nieuwklantid = $dbh->lastInsertId();
var_dump($nieuwklantid);		
                $klant = new Klant((int)$nieuwklantid, $naam, $voornaam, $straat, (int)$nummer, (int)$postId, $email, $wachtwoord, $aanmerkingspromo);
                $dbh = null;
var_dump($klant);		
            return $klant;
		
            $dbh = null;
        }


    public function getById(string $email): ?Klant {
        $sql = "SELECT id, naam, voornaam, straat, nummer, postId, email, wachtwoord, aanmerkingspromo FROM klant where email = :email";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
           if (!$rij) {
           return null;
           } else {
           $klant = new Klant((int)$rij["id"], $rij["naam"], $rij["voornaam"], $rij["straat"], (int)$rij["nummer"], (int)$rij["postId"], $rij["email"], $rij["wachtwoord"], (int)$rij["aanmerkingspromo"]);
           $dbh = null;
       return $klant;
                }
                   }
}