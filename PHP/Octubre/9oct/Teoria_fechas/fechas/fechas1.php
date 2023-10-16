<?php

function buenos_separadores($texto)
{
    return substr($texto, 2, 1) != "/" || substr($texto, 5, 1) != "/";
}
function numeros_buenos($texto)
{
    return is_numeric(substr($texto, 0, 2)) && is_numeric(substr($texto, 3, 2)) && is_numeric(substr($texto, 6, 4));
}
function fecha_valida($texto)
{
    return checkdate(substr($texto, 3, 2), substr($texto, 0, 2), substr($texto, 6, 4));
}

if (isset($_POST["btnEnviar"])) {

    $error_fecha1 = buenos_separadores($_POST["fec1"])
        || !numeros_buenos($_POST["fec1"])
        || !fecha_valida($_POST["fec1"]);

    $error_fecha2 = buenos_separadores($_POST["fec2"])
        || !numeros_buenos($_POST["fec2"])
        || !fecha_valida($_POST["fec2"]);


    $error_form = $error_fecha1 || $error_fecha2;
}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fechas 1</title>
        <style>
            .formu {
                background-color: lightblue;
                border: 1px solid black;
            }

            .resp {
                background-color: lightgreen;
                border: 1px solid black;
            }

            h1 {
                text-align: center;
            }

            .error {
                color: red;
            }
        </style>
    </head>

    <body>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="formu">
                <p>
                <h1>Fechas - Formulario</h1>
                <label for="fec1">Introduzca una fecha: (DD/MM/YYYY)</label>&nbsp;<input type="text" name="fec1" id="fec1" value="<?php if (isset($_POST["fec1"])) echo $_POST["fec1"]; ?>" />
                <?php
                if (isset($_POST["btnEnviar"]) && $error_fecha1) {
                    if ($_POST["fec1"] == "") {
                        echo "<span class='error'> * El campo no puede dejarse vacío * </span>";
                    } else {
                        echo "<span class='error'> * La fecha no es válida * </span>";
                    }
                }
                ?>
                <br />
                <label for="fec2">Introduzca una fecha: (DD/MM/YYYY)</label>&nbsp;<input type="text" name="fec2" id="fec2" value="<?php if (isset($_POST["fec2"])) echo $_POST["fec2"]; ?>" />
                <?php
                if (isset($_POST["btnEnviar"]) && $error_fecha2) {
                    if ($_POST["fec2"] == "") {
                        echo "<span class='error'> * El campo no puede dejarse vacío * </span>";
                    } else {
                        echo "<span class='error'> * La fecha no es válida * </span>";
                    }
                }
                ?>
                <br />
                <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" />
                </p>

            </div>


        </form>
        <?php
        if (isset($_POST["btnEnviar"]) && !$error_form) {
        ?>
            <div class="resp">
                <p>
                <h1>Fechas - Resultado</h1>
                <?php

                $array_fecha1 = explode("/", $_POST["fec1"]);
                $array_fecha2 = explode("/", $_POST["fec2"]);
                $tiempo1 = mktime(0, 0, 0, $array_fecha1[1], $array_fecha1[0], $array_fecha1[2]);
                $tiempo2 = mktime(0, 0, 0, $array_fecha2[1], $array_fecha2[0], $array_fecha2[2]);

                $dif = abs($tiempo1 - $tiempo2);
                $dias_pasados = floor($dif / (60 * 60 * 24));

                echo "<span>La diferencia entre ambas fechas es de " . $dias_pasados . " días.</span>";

                ?>
                </p>
            </div>
        <?php
        }
        ?>

    </body>

    </html>
<?php

?>