<?php
declare (strict_types=1);
session_start();
$root = $_SESSION["root"];
?>

<!DOCTYPE HTML>
<!-- presentation/AanmeldForm.php -->
<html>
<head>
<meta charset=utf-8>
<title>Aanmelden</title>
</head>

<body>

<h1>Meld je aan</h1>


<form method="post" action="<?php echo $root ?>/afrekening.php?action=aangemeld">

<div>Vul je emailadres in: <input type="text" name="email"></div> <BR>
<div>Vul je wachtwoord in: <input type="password" name="wachtwoord"></div> <BR>

<input type="submit" value="Aanmelden">


</form>
</body>
</html> 