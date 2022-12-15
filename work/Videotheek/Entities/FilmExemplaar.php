<?php
//Entities/FilmExemplaar.php
declare(strict_types = 1);

namespace Entities;

use Entities\Film;
use Entities\Exemplaar;

class FilmExemplaar {

private int $id;
private int $filmId; 
private string $titel;
private int $exemplaarnr;
private int $aanwezig;

public function __construct(int $id, int $filmId, string $titel, int $exemplaarnr, int $aanwezig)
{
    $this->id = $id;
    $this->filmId = $filmId;
    $this->titel = $titel;
    $this->exemplaarnr = $exemplaarnr;
    $this->aanwezig = $aanwezig;
}

public static function create(int $id, int $filmId, string $titel, int $exemplaarnr, int $aanwezig)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new FilmExemplaar($id, $filmId, $titel, $exemplaarnr, $aanwezig);
    }
    return self::$idMap[$id];
}

public function getId(): int {
    return $this->id;
    }
   
    public function getFilmId() : int {
    return $this->filmId;
    }
   
   public function getExemplaarNr(): int {
   return $this->exemplaarnr;
   }

   public function getAanwezig(): int {
    return $this->aanwezig;
    }

    public function getTitel() : string {
    return $this->titel;
        }
       
    public function setTitel(string $titel) {
    $this->titel = $titel;
    }

    public function setExemplaarNr(int $exemplaarnr) {
    $this->exemplaarnr = $exemplaarnr;
    }

}