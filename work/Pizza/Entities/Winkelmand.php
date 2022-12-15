<?php
//Entities/Winkelmand.php
declare(strict_types=1);

namespace Entities;

use Entities\Bestellijn;
use Entities\Pizza;

class Winkelmand {

 private int $id;
 private int $pizzaId;
 private string $naam;
 private string $informatie;
 private float $prijs;
 private float $promoprijs;

 public function __construct(int $id, int $pizzaId, string $naam, string $informatie, float $prijs, float $promoprijs)
 {
 $this->id = $id;
 $this->pizzaId = $pizzaId;
 $this->naam = $naam;
 $this->informatie = $informatie;
 $this->prijs = $prijs;
 $this->promoprijs = $promoprijs;
 }

 public static function create(int $id, int $pizzaId, string $naam, string $informatie, float $prijs, float $promoprijs)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Winkelmand($id, $pizzaId, $naam, $informatie, $prijs, $promoprijs);
    }
    return self::$idMap[$id];
    }

    public function getId(): int {
        return $this->id;
        }
       
       public function getPizzaId(): int {
        return $this->pizzaId;
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