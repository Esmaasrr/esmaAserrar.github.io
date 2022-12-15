<?php
//verwijderPizza.php
declare(strict_types = 1);

spl_autoload_register();

use Business\PizzaService;
use Business\BestellijnService;

//var_dump((int)$_GET["id"]);

$bestellijnSvc = new BestellijnService(); 
$verwijderd = $bestellijnSvc->verwijderBestelLijn((int) $_GET["id"]);
include("overzicht.php");
