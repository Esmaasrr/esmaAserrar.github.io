<?php 
//wijzigAdres.php
declare(strict_types=1);
error_reporting(0);
session_start();

spl_autoload_register();

use Business\PostcodeService;
use Business\KlantService;

require_once('Entities/Postcode.php');
$postcodelijst = unserialize($_SESSION['postcodes']);

//include("Presentation/wijzigAdresForm.php");

require_once('Entities/Klant.php');
//$klant = unserialize($_SESSION["klant"],['Klant']);
$klant = unserialize($_SESSION["klant"]);
$klantId = $klant->getId();

if (isset($_GET["action"]) && ($_GET["action"] === "wijzig")) {
    $klantSvc = new KlantService();
    $wijzigAdres = $klantSvc->updateAdres($klantId, $_POST['straat'], (int) $_POST['huisnummer'], (int) $_POST['gekozenPostcode']);
	
	//aanpassen.....
	$klantopnieuwophalen = $klantSvc->getKlantById($klantId);
//var_dump($klantopnieuwophalen);	
	$_SESSION["klant"] = serialize($klantopnieuwophalen);
	
    header("location: eindpagina.php");
    exit(0);
}

include("Presentation/wijzigAdresForm.php");


