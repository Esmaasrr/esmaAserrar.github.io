<?php
declare (strict_types=1);

require_once("header.php");
?>


<!DOCTYPE HTML>
<!-- presentation/OpgehaaldeFilmOverzicht.php -->
<html>
<head>
<meta charset=utf-8>
<title>Films</title>
<style>
table { border-collapse: collapse; }
td, th { border: 1px solid black; padding: 3px; }
th { background-color: #ddd; }
</style>
</head>

<body>
<h1>Opgehaalde Film</h1>
<table>
<tr>
<th>Titel</th>
<th>Nummer(s)</th>
<th>Exemplaren</th>
</tr>
<?php

foreach ($exemplaarLijst as $film) {
?><tr>
    <td>
<?php print($film->getTitel());?>
	</td>
	<td>
    <?php
$count = 0;
        if ($film->getAanwezig() === 1) {
            ?> <b>  <?php print($film->getExemplaarNr()); ?> </b> <?php
            $count++;
        } else {
            print($film->getExemplaarNr());
        }
?>
<td>
<?php print($count); ?>

</td>		
<?php
}
?>	
</table>
</body>
</html>