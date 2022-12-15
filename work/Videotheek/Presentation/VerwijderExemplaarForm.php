<?php
    declare(strict_types=1);

    require_once("header.php");

?>
<!DOCTYPE HTML>
<!-- presentation/verwijderExemplaarForm.php -->
<html>
    <head>
            <meta charset=utf-8>
            <title>Verwijder een exemplaar</title>
    </head>
    <body>
            <h1>Verwijder een exemplaar</h1>

            <form method="post" action="verwijderExemplaar.php?action=delete">
                    <table>
                        <tr>
                            <td>
                                Exemplaren:
                            </td>
                            <td>
                                <select name="exemplaar">
                                    <?php 
                                    foreach ($exemplaarLijst as $exemplaar) { ?>
                                        <option value="<?php print($exemplaar->getId());?>"><?php print($exemplaar->getExemplaarNr());?></option>
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