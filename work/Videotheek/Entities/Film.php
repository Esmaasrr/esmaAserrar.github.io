<?php
//Entities/Film.php
declare(strict_types = 1);

namespace Entities;

class Film {

 private int $id;
 private string $titel;

public function __construct(int $id, string $titel)
 {
 $this->id = $id;
 $this->titel = $titel;
 }

public static function create(int $id, string $titel)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Film($id, $titel);
    }
    return self::$idMap[$id];
    }

 public function getId(): int {
 return $this->id;
 }

 public function getTitel() : string {
 return $this->titel;
 }

public function setTitel(string $titel) {
$this->titel = $titel;
}

}
