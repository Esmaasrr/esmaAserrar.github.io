<?php
    declare(strict_types=1);

    require_once("header.php");
?>
<!DOCTYPE HTML>
<!-- presentation/filmTerugbrengenForm.php -->
<html>
    <head>
            <meta charset=utf-8>
            <title>Films</title>
    </head>
    <body>
            <h1>Een film terugbrengen</h1>

            <form method="post" action="filmTerugbrengen.php?action=terug">
                    <table>
                            <tr>
                                    <td>Exemplaarnummer:</td>
                                    <td>
                                            <input type="number" name="nummerTerug" min="1"/>
                                    </td>
                            </tr>
                            <tr>
                                    <td></td>
                                    <td>
                                            <input type="submit" value="Film Terugbrengen" />
                                    </td>
                            </tr>
                    </table>
            </form>
    </body>
</html>

