<?php
//verwijderTitel.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;
use \Exception\TitelBestaatException;


$filmSvc = new FilmService();
$filmLijst = $filmSvc->getFilmTitels();


if (isset($_GET["action"]) && ($_GET["action"] === "delete")) {

     try { 
    $filmSvc = new FilmService();
    $filmSvc->verwijderFilm((int) $_POST["titels"]);
    $exempSvc = new ExemplaarService();
    $exempSvc->verwijderExVanFilm((int)$_POST["titels"]);

 } catch (titelBestaatException $ex) { 
    header("location: verwijderTitel.php?id=".$_GET["id"]."&error=titelverwijderd");
    exit(0);
 }
 
header("location: toonallefilms.php");
exit(0);}

include("presentation/verwijderFilmTitel.php");
