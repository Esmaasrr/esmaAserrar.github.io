<?php
//aanmelden.php
declare(strict_types=1);

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\GebruikerService;

if (isset($_GET["action"]) && ($_GET["action"] === "login")) {
    
        $gebruikerSvc = new GebruikerService();
        //$nieuwG = $gebruikerSvc->createNewGebruiker($_POST["txtGebruikersnaam"], $_POST["txtWachtwoord"]);
	// Adinda toegevoegd:
	    $gebruikerGevalideerd = $gebruikerSvc->controleerGebruiker($_POST["txtGebruikersnaam"], $_POST["txtWachtwoord"]);
	    if ($gebruikerGevalideerd) {
            header("location: toonallefilms.php");
            exit(0);
		}
	    else {
            header("location: aanmelden.php");
            exit(0);			
		}
    }

    include("presentation/loginForm.php");
