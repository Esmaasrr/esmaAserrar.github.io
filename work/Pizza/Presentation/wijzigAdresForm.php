<?php
declare (strict_types=1);
session_start();

$postcodelijst = unserialize($_SESSION['postcodes']);
?>

<!DOCTYPE HTML>
<!-- presentation/wijzigAdresForm.php -->
<html>
<head>
<meta charset=utf-8>
<title>Afrekening Overzicht</title>
</head>

<body>

<h1>Wijzig je adres</h1>

<form method="post" action="wijzigAdres.php?action=wijzig">
<div>Vul je straat in: <input type="text" name="straat"> huisnummer: <input type="text" name="huisnummer"></div><BR>

<select name="gekozenPostcode" > <?php foreach ($postcodelijst as $postcode) { ?>
<option value="<?php print($postcode->getId())?>"><?php print($postcode->getPostcode())?> - <?php print($postcode->getPlaats())?></option><?php } ?></select><BR><BR>

<!--  bij het aanmaken/wijzigen van een adres 
is het beter om een select/option aan de gebruiker voor te stellen met hierin alle postcodes/plaatsen (de value bevat dan het id van de postcode). -->


<input type="submit" value="Bevestig je wijziging">

</form>
</body>
</html> 