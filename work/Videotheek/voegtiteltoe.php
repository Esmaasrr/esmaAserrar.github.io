<?php
//voegtiteltoe.php
declare(strict_types = 1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;
use \Exception\TitelBestaatException;

if (isset($_GET["action"]) && ($_GET["action"] === "process")) {

     try { 
    $filmSvc = new FilmService();
       $filmSvc->voegTitelToe($_POST["txtTitel"]);

 } catch (titelBestaatException $ex) { 
    header("location: voegtiteltoe.php?id=".$_GET["id"]."&error=titelbestaat");
    exit(0);
 }
 
header("location: toonallefilms.php");
exit(0);}

include("presentation/nieuwTitelForm.php");

/*if (isset($_GET["error"]) && ($_GET["error"] === "titelbestaat")) {
	echo "<h3>De filmtitel bestaat reeds</h3>";
} */

    
    
   
       