<?php
//verwijderExemplaar.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;
use \Exception\TitelBestaatException;


$exempSvc = new ExemplaarService();
$exemplaarLijst = $exempSvc->getExempOverzicht();


if (isset($_GET["action"]) && ($_GET["action"] === "delete")) {

    $exempSvc = new ExemplaarService();
    $exempSvc->verwijderExemplaar((int) $_POST["exemplaar"]);


header("location: toonallefilms.php");
exit(0);}

include("presentation/VerwijderExemplaarForm.php");

