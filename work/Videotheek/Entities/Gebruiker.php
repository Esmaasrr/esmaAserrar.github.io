<?php
//entities/Gebruikers.php
declare(strict_types = 1);

namespace Entities;

class Gebruiker {

 private int $id;
 private string $gebruikersnaam;
 private string $wachtwoord;

 public function __construct(int $id, string $gebruikersnaam, string $wachtwoord){
 $this->id = $id;
 $this->gebruikersnaam = $gebruikersnaam;
 $this->wachtwoord = $wachtwoord;
 }

 public static function create(int $id, string $gebruikersnaam, string $wachtwoord){
 if (!isset(self::$idMap[$id])) {
 self::$idMap[$id] = new Gebruiker($id, $gebruikersnaam, $wachtwoord);
 }
 return self::$idMap[$id];
 }

 public function getId(): int {
 return $this->id;
 }

 public function getGebruikersnaam() : string{
 return $this->gebruikersnaam;
 }
 public function setGebruikersnaam(string $gebruikersnaam){
 $this->gebruikersnaam = $gebruikersnaam;
 }

 public function getWachtwoord() : string{
    return $this->wachtwoord;
    }

public function setWachtwoord(string $wachtwoord)
{
$this->wachtwoord = $wachtwoord;
}

}