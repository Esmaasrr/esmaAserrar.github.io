<?php
    declare(strict_types=1);

    require_once("header.php");
?>
<!DOCTYPE HTML>
<!-- presentation/nieuwFilmForm.php -->
<html>
    <head>
            <meta charset=utf-8>
            <title>Films</title>
    </head>
    <body>
            <h1>Nieuw titel toevoegen</h1>
            <?php
            if (isset($_GET["error"]) && ($_GET["error"] === "titelbestaat")) {
            ?>
                <p style="color: red">Titel bestaat al!</p>
            <?php
            }
            ?>


            <form method="post" action="voegtiteltoe.php?action=process">
                    <table>
                            <tr>
                                    <td>Titel:</td>
                                    <td>
                                            <input type="text" name="txtTitel" />
                                    </td>
                            </tr>
                            <tr>
                                    <td></td>
                                    <td>
                                            <input type="submit" value="Toevoegen" />
                                    </td>
                            </tr>
                    </table>
            </form>
    </body>
</html>

