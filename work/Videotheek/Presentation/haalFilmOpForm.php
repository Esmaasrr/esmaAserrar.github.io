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
            <h1>Film Ophalen</h1>
            <!-- 
            //if (isset($error) && ($error === "titelbestaat")) {
            ?>
                <p style="color: red">Titel bestaat al!</p>
            //}
            ?> -->


            <form method="post" action="./haalFilmOp.php?action=process">
                    <table>
                            <tr>
                                    <td>Nummer:</td>
                                    <td>
                                            <input type="number" min="1" name="exemplaarnr" />
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


