<?php
    declare(strict_types=1);
    require_once("header.php");

?>
<!DOCTYPE HTML>
<!-- presentation/verwijderFilmTitel.php -->
<html>
    <head>
            <meta charset=utf-8>
            <title>Films</title>
    </head>
    <body>
            <h1>Verwijder de titel en al zijn exemplaren</h1>

            <?php
            if (isset($_GET["error"]) && ($_GET["error"] === "titelverwijderd")) {
            ?>
            <p style="color: red">Titel is al verwijderd!</p>
            <?php
            }
            ?>

            <form method="post" action="verwijderTitel.php?action=delete" required>
                    <table>
                        <tr>
                            <td>
                                Titel:
                            </td>
                            <td>
                                <select name="titels">
                                    <?php 
                                    foreach ($filmLijst as $film) { ?>
                                        <option value="<?php print($film->getId());?>" require><?php print($film->getTitel());?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                    <td></td>
                                    <td>
                                            <input type="submit" value="Verwijderen" />
                                    </td>
                            </tr>
                    </table>
            </form>
    </body>
</html>