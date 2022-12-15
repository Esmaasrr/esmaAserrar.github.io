<?php
//filmTerugbrengen.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;
use \Exception\TitelBestaatException;


if (isset($_GET["action"]) && ($_GET["action"] === "terug")) {

try { 
$exempSvc = new ExemplaarService();
$hello = $exempSvc->eenFilmTerugbrengen((int) $_POST["nummerTerug"]);


 } catch (titelBestaatException $ex) { 
    header("location: filmTerugbrengen.php?id=".$_GET["exemplaarnr"]."&error=filmIsTerug");
    exit(0);
 }

header("location: toonallefilms.php");
exit(0);
}
include("Presentation/filmTerugbrengenForm.php");


If (isset($_GET["error"]) && ($_GET["error"] === "filmIsTerug")) {
    ?>  <p style="color: red">Film is al in bezit!</p>
    <?php
    }
    ?>
    