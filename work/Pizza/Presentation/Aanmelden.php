<?php
declare (strict_types=1);
session_start();

$root = $_SESSION["root"];

?>

<!DOCTYPE HTML>
<!-- presentation/Aanmelden.php -->
<html>
<head>
<meta charset=utf-8>
<title>Aanmelden?</title>
</head>

<body>

<a href="<?php echo $root ?>/Presentation/AanmeldForm.php"><h2>Ik heb een account</h2></a>
<a href="<?php echo $root ?>/Presentation/inschrijfFormulier.php"><h2>Ik heb geen account</h2></a>

</body>
</html> 