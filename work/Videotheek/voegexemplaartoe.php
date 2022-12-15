<?php
//voegexemplaartoe.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;
use \Exception\TitelBestaatException;

$filmSvc = new FilmService();
$filmLijst = $filmSvc->getFilmTitels();

if (isset($_GET["action"]) && ($_GET["action"] === "process")) {

    try {
        $exnummer = $_POST["exemplaarNummer"];
        $titel = $_POST["titels"];
        var_dump((int)$exnummer);
        var_dump((int)$titel);

    $exempSvc = new ExemplaarService();
    $exempSvc->voegExemplaarToe((int) $exnummer, (int) $titel);
    
      } catch (titelBestaatException $ex) {
          header("location: voegexemplaartoe.php?id=".$_GET["filmId"]."&error=exemplaarbestaat");
          exit(0);
      }
    
    header("location: toonallefilms.php");
    exit(0);
        }

include("presentation/nieuwExemplaarForm.php");