<?php
//Entities/Klant.php
declare(strict_types = 1);

namespace Entities;

class Klant {

 private int $id;
 private string $naam;
 private string $voornaam;
 private string $straat;
 private int $nummer;
 private int $postId;
 private string $email;
 private string $wachtwoord;
 private int $aanmerkingspromo;

public function __construct(int $id, string $naam, string $voornaam, string $straat, int $nummer, int $postId, string $email, string $wachtwoord, int $aanmerkingspromo)
 {
 $this->id = $id;
 $this->naam = $naam;
 $this->voornaam = $voornaam;
 $this->straat = $straat;
 $this->nummer = $nummer;
 $this->postId = $postId;
 $this->email = $email;
 $this->wachtwoord = $wachtwoord;
 $this->aanmerkingspromo = $aanmerkingspromo;
 }

public static function create(int $id, string $naam, string $voornaam, string $straat, int $nummer, int $postId, string $email, string $wachtwoord, int $aanmerkingspromo)
{
    if (!isset(self::$idMap[$id])) {
    self::$idMap[$id] = new Klant($id, $naam, $voornaam, $straat, $nummer, $postId, $email, $wachtwoord, $aanmerkingspromo);
    }
    return self::$idMap[$id];
    }

 public function getId(): int {
 return $this->id;
 }

 public function getNaam() : string {
 return $this->naam;
 }

 public function getVoornaam() : string {
    return $this->voornaam;
    }

 public function getStraat() : string {
    return $this->straat;
    }

 public function getNummer() : int {
 return $this->nummer;
 }

 public function getPostId() : int {
    return $this->postId;
    }

 public function getEmail() : string {
    return $this->email;
    }

 public function getWachtwoord() : string {
    return $this->wachtwoord;
    }

 public function getAanmerkingspromo() : int {
    return $this->aanmerkingspromo;
    }


        public function setNaam(string $naam) : string {
            return $this->naam;
            }
       
        public function setVoornaam(string $voornaam) : string {
           return $this->voornaam;
           }
       
        public function setStraat(string $straat) : string {
           return $this->straat;
           }
       
        public function setNummer(int $nummer) : int {
            return $this->nummer;
            }
       
        public function setPostId(int $postId) : int {
           return $this->postId;
           }

        public function setEmail(string $email) : string {
            return $this->email;
            }
            
        public function setWachtwoord(string $wachtwoord) : string {
            return $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT); 
            }

        public function setAanmerkingspromo(int $aanmerkingspromo) : int {
            return $this->aanmerkingspromo;
            }
    
}
