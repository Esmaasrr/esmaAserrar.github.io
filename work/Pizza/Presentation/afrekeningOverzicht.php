<?php
declare (strict_types=1);
?>

<!DOCTYPE HTML>
<!-- presentation/afrekeningOverzicht.php -->
<html>
<head>
<meta charset=utf-8>
<title>Afrekening Overzicht</title>
</head>

<body>

<h1>Overzicht van je afrekening</h1>

<form method="post" action="eindpagina.php?action=totaal">

<h3>Volgende pizza's besteld:</h3>
<table>
    <tr>
    <th></th>
    <th> Pizza</th>
    <th></th>
    <th>Totaalprijs</th></tr><?php 
foreach ($bestellijnIds as $it) { ?>
    <tr>
        <td></td>
        <td> <?php print($it->getNaam());?> - <?php print($it->getInformatie());?>  </td>
 <td></td>
    </tr><?php } ?>
    <tr><td>
    </td>
<td></td>
<td></td>
<td><?php print($total); ?> euro</td></tr>
</table>

<button><a href="overzicht.php">Wijzig bestelling</a></button><br><br>
<br>

<?php if(!$error == "") {
print($error)?> 
Verander <a href="./wijzigAdres.php">hier</a> uw adresgegevens indien gewenst. <br><br>
<?php } else { ?>

</form>
<a href="besteld.php?action=einde"><button>Bestel</button></a>

<?php } ?>
</body>
</html> 