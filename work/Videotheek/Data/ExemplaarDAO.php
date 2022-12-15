<?php
//data/FilmDAO.php
declare(strict_types = 1);

namespace Data;

use Data\FilmDAO;
use Entities\Film;
use Entities\Exemplaar;
use Entities\FilmExemplaar;
use \Exception\TitelBestaatException;
use \PDO;

class ExemplaarDAO 
{
    public function getAllEx(): array 
    {
        $sql = "SELECT id, filmId, exemplaarnr, aanwezig FROM exemplaar";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
        $exemplaar = new Exemplaar((int)$rij["id"], (int)$rij["filmId"], (int)$rij["exemplaarnr"], (int)$rij["aanwezig"]);
        array_push($lijst, $exemplaar);
        }
        $dbh = null;
        return $lijst;
    }

    public function getByNummer(int $exemplaarnr): array 
    {
        $sql = "SELECT films.id, exemplaar.id, filmId, titel, exemplaarnr, aanwezig FROM films join exemplaar on films.id=exemplaar.filmId where :exemplaarnr = exemplaarnr";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultset = $dbh->prepare($sql);
        $resultset->execute(array(':exemplaarnr' => $exemplaarnr));
        $lijst = array();
        foreach ($resultset as $rij){
            $exemplaar = new FilmExemplaar((int)$rij["id"], (int)$rij["filmId"], (string)$rij["titel"], (int)$rij["exemplaarnr"], (int)$rij["aanwezig"]);
            array_push($lijst, $exemplaar);
        }
        $dbh = null; 
        return $lijst;

    }

    public function createExemplaar(int $exemplaarnr, int $filmId)
    {
        $bestaandExemplaar = $this->getExempNummer($exemplaarnr);
        var_dump($bestaandExemplaar);

        if (!is_null($bestaandExemplaar))
        {
            throw new titelBestaatException();
        }

        $sql = "insert into exemplaar (exemplaarnr, filmId, aanwezig) values (:exemplaarnr, :filmId, :aanwezig) ";
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$resultSet = $dbh->prepare($sql);
        $resultSet->execute(array(':exemplaarnr' => $exemplaarnr, ':filmId' => $filmId, ':aanwezig' => 1));	
	$exemplaarId = $dbh->lastInsertId();
	$dbh = null;
        $exemplaar = new Exemplaar((int)$exemplaarId, (int)$filmId, (int)$exemplaarnr, (int)$aanwezig);
	return $exemplaar;
    }


    public function getExempNummer(int $exemplaarnr): ?Exemplaar {
        $sql = "SELECT id, exemplaarnr, filmid, aanwezig FROM exemplaar where exemplaarnr = :exemplaarnr";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':exemplaarnr' => $exemplaarnr));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
           if (!$rij) {
           return null;
           } else {
           $exemplaar = new Exemplaar((int)$rij["id"], (int)$rij["exemplaarnr"], (int)$rij["filmId"], (int)$rij["aanwezig"]);
           $dbh = null;
       return $exemplaar;
                }
                   }


     public function deleteExemplaar(int $id) {
        $sql = "delete from exemplaar where id = :id" ;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $dbh = null;
                    }



                    public function deleteFilm(int $filmId) {
                        $sql = "delete from exemplaar where filmId = :filmId" ;
                        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute(array(':filmId' => $filmId));
                        $dbh = null;
                                    }
        
                                 
                                    


        public function exemplaarTerug(int $exemplaarnr) {
            $sql = "update exemplaar set aanwezig = :aanwezig where exemplaarnr = :exemplaarnr";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array('exemplaarnr' => $exemplaarnr, 'aanwezig' => 1));
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$rij) {
                return null;
                } else {
                $exemplaar = new Exemplaar((int)$rij["id"], (int)$rij["exemplaarnr"], (int)$rij["filmId"], (int)$rij["aanwezig"]);
                $dbh = null;
            return $exemplaar;
                }
        }


        public function exemplaarWeg(int $exemplaarnr) {
            $sql = "update exemplaar set aanwezig = :aanwezig where exemplaarnr = :exemplaarnr";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array('exemplaarnr' => $exemplaarnr, 'aanwezig' => 0));
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$rij) {
                return null;
                } else {
                $exemplaar = new Exemplaar((int)$rij["id"], (int)$rij["exemplaarnr"], (int)$rij["filmId"], (int)$rij["aanwezig"]);
                $dbh = null;
            return $exemplaar;
                }
        }
}