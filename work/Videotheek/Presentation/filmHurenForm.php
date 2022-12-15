<?php
    declare(strict_types=1);
    require_once("header.php");
?>
<!DOCTYPE HTML>
<!-- presentation/filmHurenForm.php -->
<html>
    <head>
            <meta charset=utf-8>
            <title>Films</title>
    </head>
    <body>
            <h1>Een film huren</h1>

            <form method="post" action="filmHuren.php?action=huren">
                    <table>
                            <tr>
                                    <td>Exemplaarnummer:</td>
                                    <td>
                                            <input type="number" min="1" name="gekozenNummer" />
                                    </td>
                            </tr>
                            <tr>
                                    <td>
                                            <input type="submit" value="Deze exemplaar verhuren" />
                                    </td>
                            </tr>
                    </table>
            </form>
    </body>
</html>

