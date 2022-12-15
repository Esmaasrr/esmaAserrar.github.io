<?php
//data/FilmDAO.php
declare(strict_types = 1);

namespace Data;

use Data\ExemplaarDAO;
use Entities\Film;
use Entities\Exemplaar;
use Entities\FilmExemplaar;
use Exception\titelBestaatException;
use \PDO;

class FilmDAO {

    public function getAlleenFilms(): array 
    {
        $sql = "SELECT id, titel FROM films order by titel";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
        $film = new Film((int)$rij["id"], $rij["titel"]);
        //var_dump($film);
        array_push($lijst, $film);
        }
        $dbh = null;
        return $lijst;
    }

    public function getAlles(): array 
    {
        $sql = "SELECT films.id, exemplaar.id, filmId, titel, exemplaarnr, aanwezig FROM films join exemplaar on films.id=exemplaar.filmId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach ($resultSet as $rij){
        $exemplaren = new FilmExemplaar((int)$rij["id"], (int)$rij["filmId"], (string)$rij["titel"], (int)$rij["exemplaarnr"], (int)$rij["aanwezig"]);
        array_push($lijst, $exemplaren);
        }
        $dbh = null;
        return $lijst;
    }


    public function create(string $titel)
    {
        $bestaandTitel = $this->getByTitel($titel);
        var_dump($bestaandTitel);

        if (!is_null($bestaandTitel))
        {
            throw new titelBestaatException();
        }

        $sql = "insert into films (titel) values (:titel)";
	$dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
	$resultSet = $dbh->prepare($sql);
        $resultSet->execute(array(':titel' => $titel));	
	$titelId = $dbh->lastInsertId();
	$dbh = null;
        $film = new Film((int)$titelId, $titel);
	return $film;
    }


    public function getByTitel(string $titel): ?Film {
        $sql = "SELECT id, titel FROM films where titel = :titel";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':titel' => $titel));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
           if (!$rij) {
           return null;
           } else {
           $film = new Film((int)$rij["id"], $rij["titel"]);
           $dbh = null;
       return $film;
                }
                   }

     public function deleteTitel(int $id) {
                    $sql = "delete from films where id = :id" ;
                    $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
                    $stmt = $dbh->prepare($sql);
                     $stmt->execute(array(':id' => $id));
                    $dbh = null;
                    }   

}




?>