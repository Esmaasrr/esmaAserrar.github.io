<?php 
//BroodOverzicht.php
declare(strict_types=1); 

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Broodjes overzicht</title>
    </head>

    <body>
        <h1>Overzicht van de broodjes</h1>

        <form action="besteld.php?action=add" method= "post">
  <label>Kies een broodje:</label>
  <select name="broodjeslijst">
<?php
	    foreach ($broodjesLijst as $brood) { 
	?>
    <option value="<?php print($brood->getId());?>"> <?php print($brood->getNaam());?>  -  <?php print($brood->getOmschrijving());?>   -  <?php print($brood->getPrijs());?>  euro.</option>

    <?php
	}
	?>
</select>

</br>
</br>
</br>

<h1>Vul je gegevens in:</h1>


<label>Voornaam: <input type="text" name="voornaam" required /></label>
</br>
</br>
<label>Achternaam: <input type="text" name="achternaam" required /></label>
</br>
</br>
<label>Email: <input type="text" name="email" required/></label>
</br>
</br>
</br>
</br>

Datum: <input type="date" name="datum" value="<?php print date('Y-m-d'); ?>" min="<?php print date('Y-m-d'); ?>" /><br />	
Uur: <input type="time" name="uur" value="<?php print date('H:i', strtotime("+30 minutes")); ?>" min="<?php print date('H:i', strtotime("+30 minutes")); ?>" /><br />


    <input type ="submit" value="Plaats bestelling"/>

</form>
		
    </body>
</html>