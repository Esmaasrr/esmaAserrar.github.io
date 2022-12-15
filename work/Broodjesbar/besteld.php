<?php
//besteld.php
declare(strict_types=1);

spl_autoload_register();

session_start();

use Business\BestellingenService;
use Business\KlantenService;
use Business\StatussenService;

if (isset($_GET['action'])) { 
	if ($_GET['action'] === 'add') { 
		$voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $email = $_POST['email'];
		$afhalingsmoment = $_POST['datum'].' '.$_POST['uur'];
        $broodjeId = $_POST['broodjeslijst'];

        $ki = new KlantenService();
        $klantUpdate = $ki->klantToevoegen($voornaam, $achternaam, $email);
		
		//echo "<h1>klantupdate: het id van de ingevoerde klant = {$klantUpdate}</h1>";

        $bi = new BestellingenService(); 
		$bestelUpdate = $bi->updateBestelling((int) $broodjeId, (int) $klantUpdate, $afhalingsmoment, 1);

    }}

$bo = new BestellingenService();
$overzicht = $bo->getBestelLijst(); 

    $bg = new BestellingenService(); 
$gemaakt = $bg->bestellingGemaakt(); 
include("Presentation/Besteloverzicht.php");

?>