<?php
//filmHuren.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;
use \Exception\TitelBestaatException;

if (isset($_GET["action"]) && ($_GET["action"] === "huren")) {

try { 
    var_dump($_POST["gekozenNummer"]);
$exempSvc = new ExemplaarService();
$hello = $exempSvc->eenFilmHuren((int) $_POST["gekozenNummer"]);

 } catch (titelBestaatException $ex) { 
    header("location: filmHuren.php?id=".$_GET["exemplaarnr"]."&error=filmIsGehuurd");
    exit(0);
 }

header("location: toonallefilms.php");
exit(0);
}
include("Presentation/filmHurenForm.php");


If (isset($_GET["error"]) && ($_GET["error"] === "filmIsGehuurd")) { 
    ?>   <p style="color:red">Film is al verhuurd!</p>   
    <?php
    }
    ?>
    