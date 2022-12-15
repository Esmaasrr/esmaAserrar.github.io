<?php
declare (strict_types=1);

require_once("header.php");
?>

<!DOCTYPE HTML>
<!-- presentation/FilmOverzicht.php -->
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


<h1>Filmlijst</h1>
<table>
<tr>
<th>Titel</th>
<th>Nummer(s)</th>
<th>Exemplaren</th>
</tr>
<?php

foreach ($filmLijst as $film) {
?><tr>
    <td>
<?php print($film->getTitel()); ?> 
	</td>
	<td>
    <?php
$count = 0;
foreach ($exemplaarLijst as $exemplaar) {
    if ($film->getId() == $exemplaar->getFilmId()) {
    
        if ($exemplaar->getAanwezig() === 1) {
            ?> <b>  <?php print($exemplaar->getExemplaarNr()); ?> </b> <?php
            $count++;
        } else {
            print($exemplaar->getExemplaarNr());
        }
}
?>
<?php
}
?>	
</td>		
<td>
<?php print($count);?>
</td>
<?php
}
?>	
</table>
</body>
</html> 