<?php
declare (strict_types=1);
?>

<!DOCTYPE HTML>
<!-- presentation/PizzaOverzicht.php -->
<html>
<head>
<meta charset=utf-8>
<title>Pizza bestellen</title>
</head>

<body>
<h1>Kies je pizza:</h1>

<form method="post" action="overzicht.php?action=choose">Pizzamenu:
    <select name="gekozenPizza" > <?php foreach ($pizzaLijst as $pizza) { ?> 
    <option value="<?php print($pizza->getId())?>"><?php print($pizza->getNaam())?> - <?php print($pizza->getInformatie())?> - <?php print($pizza->getPrijs())?></option><?php } ?></select>

<button>Toevoegen</button>
</form>
</form>
</body>
</html> 