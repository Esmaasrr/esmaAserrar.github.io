<?php
    declare(strict_types=1);

    require_once("header.php");
?>
<!DOCTYPE HTML>
<!-- presentation/nieuwExemplaarForm.php -->
<html>
    <head>
            <meta charset=utf-8>
            <title>Films</title>
    </head>
    <body>
            <h1>Nieuw exemplaar toevoegen</h1>

            <?php
            if (isset($_GET["error"]) && ($_GET["error"] === "exemplaarbestaat")) {
            ?>
            <p style="color: red">Exemplaar bestaat al!</p>
            <?php
            }
            ?>

            <form method="post" action="voegexemplaartoe.php?action=process" require>
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
                                    <td>Exemplaar:</td>
                                    <td>
                                            <input type="number" min = "1" name="exemplaarNummer" require/>
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