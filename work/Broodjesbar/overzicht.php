<?php 
//BroodOverzicht.php
declare(strict_types=1); 

spl_autoload_register();

session_start();

use Business\BroodjesService; 
use Entities\Klanten; 
use Entities\Statussen;
use Entities\Bestellingen;  


$broodjesSvc = new BroodjesService();
$broodjesLijst = $broodjesSvc->broodjesOverzicht(); 

include("Presentation/BroodOverzicht.php");



