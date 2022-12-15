<?php
//eindpagina.php
declare(strict_types = 1);

session_start();

spl_autoload_register();

use Business\BestellingService; 
use Business\BestellijnService;
use Business\KlantService;
use Business\PostcodeService;

require_once("afrekening.php");

if(!isset($_SESSION["klant"])) {
    header("Location: Presentation/Aanmelden.php");
    exit(0);
}

$klant = unserialize($_SESSION["klant"]);
//var_dump($klant);

$error = "";
$total = 0;
$bestellijnSvc = new BestellijnService();
$bestellijnIds = $bestellijnSvc->getBestellijnen();

$postcodeSvc = new PostcodeService(); 
$leverbaarInPostcode = $postcodeSvc->leverControle((int)$klant->getPostId());
//var_dump($leverbaarInPostcode);

if ($leverbaarInPostcode == false) 
{ 
    $error .= "Het spijt me, we leveren niet in uw gemeente.";
}

foreach ($bestellijnIds as $ids) {
    $total += $ids->getPrijs();
}

$bestellingSvc = new BestellingService();

foreach ($bestellijnIds as $ids) {
$bestelling = $bestellingSvc->nieuwBestelling($klant->getId(), $ids->getId(), $total);
}


include("Presentation/afrekeningOverzicht.php");

