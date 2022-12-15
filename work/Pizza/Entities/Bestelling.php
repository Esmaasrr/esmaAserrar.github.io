<?php
//Entities/Bestelling.php
declare(strict_types=1);

namespace Entities; 

class Bestelling  {

 private int $id;
 private int $bestellijnId;
 private int $klantId;
 private float $totaalprijs;

 public function __construct(int $id, int $bestellijnId, int $klantId, float $totaalprijs)
 {
 $this->id = $id;
 $this->bestellijnId = $bestellijnId;
 $this->klantId = $klantId;
 $this->totaalprijs = $totaalprijs;
 }

public static function create(int $id, int $bestellijnId, int $klantId, float $totaalprijs)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Bestelling($id, $bestellijnId, $klantId, $totaalprijs);
    }
    return self::$idMap[$id];
    }

 public function getId(): int {
 return $this->id;
 }

 public function getBestellijnId(): int {
   return $this->bestellijnId;
   }

 public function getKlantId(): int {
 return $this->klantId;
 }

 public function getTotaalprijs(): float {
    return $this->totaalprijs;
    }


}
