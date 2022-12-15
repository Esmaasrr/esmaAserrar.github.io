<?php
//Entities/Exemplaar.php
declare(strict_types = 1);

namespace Entities;

class Exemplaar {

private int $id;
private int $filmId;
private int $exemplaarnr;
private int $aanwezig;

public function __construct(int $id,int $filmId, int $exemplaarnr, int $aanwezig)
{
    $this->id = $id;
    $this->filmId = $filmId;
    $this->exemplaarnr = $exemplaarnr;
    $this->aanwezig = $aanwezig;
}

public static function create(int $id, int $filmId, int $exemplaarnr, int $aanwezig)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Exemplaar($id, $filmId, $exemplaarnr, $aanwezig);
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

    public function setExemplaarNr(int $exemplaarnr) {
    $this->exemplaarnr = $exemplaarnr;
    }

}