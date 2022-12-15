<?php
//Entities/Pizza.php
declare(strict_types=1);

namespace Entities; 

class Pizza {

 private int $id;
 private string $naam;
 private string $informatie;
 private float $prijs;
 private float $promoprijs;

 public function __construct(int $id, string $naam, string $informatie, float $prijs, float $promoprijs)
 {
 $this->id = $id;
 $this->naam = $naam;
 $this->informatie = $informatie;
 $this->prijs = $prijs;
 $this->promoprijs = $promoprijs;
 }

public static function create(int $id, string $naam, string $informatie, float $prijs, float $promoprijs)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Pizza($id, $naam, $informatie, $prijs, $promoprijs);
    }
    return self::$idMap[$id];
    }

 public function getId(): int {
 return $this->id;
 }

 public function getNaam(): string {
 return $this->naam;
    }

public function getInformatie(): string {
 return $this->informatie;
 }

 public function getPrijs(): float {
 return $this->prijs;
 }

 public function getPromoprijs(): float {
 return $this->promoprijs;
 }

}