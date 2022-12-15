<?php
//haalFilmOp.php

spl_autoload_register();

session_start();

require_once("vendor/autoload.php");

use Business\FilmService;
use Business\ExemplaarService;


if (isset($_GET["action"]) && $_GET["action"] == "process") {

	$exempSvc = new ExemplaarService();
	$exemplaarLijst = $exempSvc->getFilmByNummer((int) $_POST["exemplaarnr"]);
	
	/* Deze code wordt niet gebruikt?
	$filmSvc = new FilmService();
	$heleLijst = $filmSvc->getFilmOverzicht();
	*/

	include("Presentation/OpgehaaldeFilmOverzicht.php");
	exit(0);

} 
include("Presentation/haalFilmOpForm.php");




?>