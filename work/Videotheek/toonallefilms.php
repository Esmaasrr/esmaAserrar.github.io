<?php
//toonallefilms.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;


$filmSvc = new FilmService();
$filmLijst = $filmSvc->getFilmTitels();

$exempSvc = new ExemplaarService();
$exemplaarLijst = $exempSvc->getExempOverzicht();


include("Presentation/FilmOverzicht.php");


?>