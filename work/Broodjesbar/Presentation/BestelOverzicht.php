<?php 
declare(strict_types = 1);
?>

<!DOCTYPE html>
<!-- bestelOverzicht.php-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Bestellingen overzicht</title>
    </head>
    <body>
    
<h1>Overzicht bestellingen:</h1>
		
        <ul><?php 
        foreach ($overzicht as $item) { ?>
        <li>
            <?php print($item->getBestelID())?> 
            - <?php print($item->getBroodjeObject()->getNaam())?> - 
            <?php print($item->getBroodjeObject()->getPrijs())?> - 
            <?php print($item->getKlantObject()->getVoornaam())?> <?php print ($item->getKlantObject()->getAchternaam())?> - 
            <a href = "gemaakt.php?action=statusupdate&statusid=<?php print($item->getStatusObject()->getStatusId())?>&bestelid=<?php print($item->getBestelID())?>"><?php print($item->getStatusObject()->getStatus())?></a>
        </li>
            <?php
        }
      ?>
        </ul>

    </body>
</html>


