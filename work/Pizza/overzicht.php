<?php
//overzicht.php
declare(strict_types = 1);
error_reporting(0);
session_start();

spl_autoload_register();

require_once("vendor/autoload.php");



// bron onderstaande code internet -> om problemen van doorverwijzen formulieren op te lossen
if (!isset($_SESSION["root"])){  // bewaar de root url in een sessievariabele
$current_url_path = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$current_url_path = substr($current_url_path, -4) == ".php" ?
    implode("/", array_slice((explode("/", $current_url_path)), 0, -1)) : $current_url_path;

//echo $current_url_path;
$_SESSION["root"] = $current_url_path;
}

use Business\PizzaService;
use Business\BestellijnService;
use Business\PostcodeService;

$pizzaSvc = new PizzaService();
$pizzaLijst = $pizzaSvc->getOverzichtPizza();

//haal alle postcodes op, bewaar in een sessievariabele en maak select/option in de presentatielaag
$postcodeSvc = new PostcodeService();
$postcodelijst = $postcodeSvc->getAllePostcodes();
$_SESSION["postcodes"] = serialize($postcodelijst);

include("Presentation/PizzaOverzicht.php");

if (isset($_GET["action"]) && ($_GET["action"] === "choose")) {

$bestellijnSv = new BestellijnService();
$nieuweLijn = $bestellijnSv->voegBestellijnenToe((int) $_POST["gekozenPizza"]);
}

$bestellijnSv = new BestellijnService(); 
$bestellijnLijst = $bestellijnSv->getBestellijnen();
//var_dump($bestellijnLijst);


include("Presentation/WinkelmandOverzicht.php");

?>