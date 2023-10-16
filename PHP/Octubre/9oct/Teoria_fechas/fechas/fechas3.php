<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas 3 </title>
    <style>
        .formu {
            background-color: lightblue;
            border: 1px solid black;
            padding-left: 25px;
        }

        .resp {
            background-color: lightgreen;
            border: 1px solid black;
            padding-left: 25px;
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
            <p>
                <span>Fecha 1</span>
                <input type="date" name="fec1" id="fec1" />
            </p>
            <p>
                <span>Fecha 2</span>
                <input type="date" name="fec2" id="fec2" />
            </p>

            <br /><br />
            <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" />
            </p>

        </div>


    </form>
    <?php
    if (isset($_POST["btnEnviar"])) {
    ?>
        <div class="resp">
            <h1>Fechas - Respuesta</h1>
            <p>
                <?php
                $anio1 = intval(substr($_POST["fec1"], 0, 4));
                $mes1 = intval(substr($_POST["fec1"], 6, 2));
                $dia1 = intval(substr($_POST["fec1"], 8, 2));

                $anio2 = intval(substr($_POST["fec2"], 0, 4));
                $mes2 = intval(substr($_POST["fec2"], 6, 2));
                $dia2 = intval(substr($_POST["fec2"], 8, 2));

                $tiempo1 = mktime(0, 0, 0, $mes1, $dia1, $anio1);
                $tiempo2 = mktime(0, 0, 0, $mes2, $dia2, $anio2);

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