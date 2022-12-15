<?php
declare (strict_types=1);
//session_start();
?>

<!DOCTYPE HTML>
<!-- presentation/WinkelmandOverzicht.php -->
<html>
<head>
<meta charset=utf-8>
<title>Pizza bestellen</title>
</head>

<body>

<h1>Winkelmandje</h1>
<form method="post" action="afrekening.php?action=afreken">
    <table>
        <tr>
            <th>Gekozen pizza('s):</th>
        </tr>
        <?php foreach ($bestellijnLijst as $keus) { ?>
            <tr>
                <td><option value="<?php print($keus->getId())?>" ><?php print($keus->getNaam())?> - <?php print($keus->getInformatie())?> - <?php print($keus->getPrijs())?></option></td>
                <td><a href="verwijderpizza.php?id=<?php print($keus->getId());?>">Verwijder</a></td>
            </tr>
            <?php } ?>
    </table>

<!--<button>Afrekenen</button>-->
<input type="submit" value="Afrekenen" >
</form>
</body>
</html> 