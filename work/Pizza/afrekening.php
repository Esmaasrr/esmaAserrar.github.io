<?php
//overzicht.php
declare(strict_types = 1);
error_reporting(0);
session_start();

spl_autoload_register();

use Business\PostcodeService; 
use Business\KlantService;
use Exception\BestaatException; 

if (isset($_GET["action"]) && ($_GET["action"] === "afreken"))
{

    if (isset($_GET["action"]) && ($_GET["action"] === "afreken"))
    {
        if (isset($_SESSION["klant"])) {
            header("location: eindpagina.php");
        } else {

		
    include("Presentation/Aanmelden.php");
    }}}


if (isset($_GET["action"]) && ($_GET["action"] === "ingeschreven"))
{
	
    $klantSvc = new KlantService();
    $klant = $klantSvc->klantToevoegen($_POST['naam'], $_POST['voornaam'], $_POST['straat'], 
    (int)$_POST['huisnummer'], (int)$_POST['gekozenPostcode'], $_POST['email'], $_POST['wachtwoord'], 0);
    $_SESSION["klant"] = serialize($klant);
    header("location: eindpagina.php");
    exit(0);
}

if (isset($_GET["action"]) && ($_GET["action"] === "aangemeld"))
{
$klantSvc = new KlantService();
$klant = $klantSvc->bestaatKlant($_POST['email'], $_POST['wachtwoord']);
$_SESSION["klant"] = serialize($klant);

if (!is_null($klant))
{
     header("location: eindpagina.php");
    exit(0);
} else {
    print("account bestaat niet.");
    include("Presentation/Aanmelden.php");
}

}