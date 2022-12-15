<?php
//besteld.php
declare(strict_types = 1);

session_start();

use Business\BestellijnService;

unset($_SESSION["klant"]);

spl_autoload_register();

print("Uw bestelling is geplaatst.");

$bestellijnSvc = new BestellijnService(); 
$reset = $bestellijnSvc->verwijderBestelLijnen();
return $reset;