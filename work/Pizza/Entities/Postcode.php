<?php
//Entities/Postcode.php
declare(strict_types=1);

namespace Entities; 

class Postcode  {

 private int $id;
 private int $postcode;
 private string $plaats;
 private int $isLeverbaar;

 public function __construct(int $id, int $postcode, string $plaats, int $isLeverbaar)
 {
 $this->id = $id;
 $this->postcode = $postcode;
 $this->plaats = $plaats;
 $this->isLeverbaar = $isLeverbaar;
 }

public static function create(int $id, int $postcode, string $plaats, int $isLeverbaar)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Postcode($id, $postcode, $plaats, $isLeverbaar);
    }
    return self::$idMap[$id];
    }

 public function getId(): int {
 return $this->id;
 }

 public function getPostcode(): int {
    return $this->postcode;
    }

 public function getPlaats(): string {
    return $this->plaats;
    }

 public function getIsLeverbaar(): int {
    return $this->isLeverbaar;
    }
}