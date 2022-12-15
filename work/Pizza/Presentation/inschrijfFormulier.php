<?php
declare (strict_types=1);
session_start();

require_once('../Entities/Postcode.php');
$postcodelijst = unserialize($_SESSION['postcodes']);
$root = $_SESSION["root"];
?>

<!DOCTYPE HTML>
<!-- presentation/inschrijfFormulier.php -->
<html>
<head>
<meta charset=utf-8>
<title>Inschrijven</title>
</head>

<body>

<h1>Schrijf je in</h1>

<form method="post" action="<?php echo $root ?>/afrekening.php?action=ingeschreven">


<div>Vul je Naam in: <input type="text" name="naam"></div><BR>
<div>Vul je Voornaam in: <input type="text" name="voornaam"></div><BR>
<div>Vul je straat in: <input type="text" name="straat"> huisnummer: <input type="text" name="huisnummer"></div><BR>
<select name="gekozenPostcode" > <?php foreach ($postcodelijst as $postcode) { ?>
<option value="<?php print($postcode->getId())?>"><?php print($postcode->getPostcode())?> - <?php print($postcode->getPlaats())?></option>
<?php } ?></select><br>

<div>Vul je telefoonnummer in: <input type="text" name="telefoonnummer"></div> <BR>
<div>Vul je emailadres in: <input type="text" name="email"></div> <BR>
<div>Vul je wachtwoord in: <input type="password" name="wachtwoord"></div> <BR>

<input type="submit" value="Nieuw account aanmaken">


</form>
</body>
</html> 