<?php
//Entities/Bestellijn.php
declare(strict_types=1);

namespace Entities; 

class Bestellijn  {

 private int $id;
 private int $pizzaId;

 public function __construct(int $id, int $pizzaId)
 {
 $this->id = $id;
 $this->pizzaId = $pizzaId;
 }

public static function create(int $id, int $pizzaId)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Bestellijn($id, $pizzaId);
    }
    return self::$idMap[$id];
    }

 public function getId(): int {
 return $this->id;
 }

public function getPizzaId(): int {
 return $this->pizzaId;
 }

}