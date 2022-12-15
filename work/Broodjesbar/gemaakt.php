<?php
//gemaakt.php
declare(strict_types=1);

spl_autoload_register();

session_start();

use Business\BestellingenService;
use Business\KlantenService;
use Business\StatussenService;

if (isset($_GET['action'])){
	if ($_GET['action'] === 'statusupdate') {
		if ($_GET['statusid'] == 1) 
		{$nieuwstatusid = 2;}
		if ($_GET['statusid'] == 2) 
		{$nieuwstatusid = 3;}

var_dump((int) $_GET['bestelid']);
var_dump((int) $_GET['statusid']);
var_dump($nieuwstatusid);

$bo = new BestellingenService();
$bo->pasStatusAan($nieuwstatusid, (int)$_GET['bestelid']);

	}
}

$bo = new BestellingenService();
$overzicht = $bo->getBestelLijst(); 

$bg = new BestellingenService(); 
$gemaakt = $bg->bestellingGemaakt(); 
include("Presentation/Besteloverzicht.php");