<?php



function fecha_valida($dia, $mes, $anio)
{
    return checkdate($mes, $dia, $anio);
}

if (isset($_POST["btnEnviar"])) {

    $error_fecha1 = !fecha_valida($_POST["dia1"], $_POST["mes1"], $_POST["anio1"]);

    $error_fecha2 = !fecha_valida($_POST["dia2"], $_POST["mes2"], $_POST["anio2"]);


    $error_form = $error_fecha1 || $error_fecha2;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas 2 </title>
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
            <?php
            $meses = [1 => "enero", 2 => "febrero", 3 => "marzo", 4 => "abril", 5 => "mayo", 6 => "junio", 7 => "julio", 8 => "agosto", 9 => "septiembre", 10 => "octubre", 11 => "noviembre", 12 => "diciembre"];

            echo "<span>Fecha 1: </span>";
            echo "<br/>";
            echo "<br/>";
            echo "<span>Día: </span>";
            echo "<select name='dia1' id='dia1'>";
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
            }

            echo "</select>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<span>Mes: </span>";
            echo "<select name='mes1' id='mes1'>";
            foreach ($meses as $key => $value) {
                echo "<option value='" . $key . "'>" . $value . "</option>";
            }
            echo "</select>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<span>Año: </span>";
            echo "<select name='anio1' id='anio1'>";
            for ($i = 1973; $i <= 2023; $i++) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
            }
            echo "</select>";
            if (isset($_POST["btnEnviar"]) && $error_fecha1) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<span class='error'>* Fecha introducida no válida. * </span>";
            }
            echo "<br/>";
            echo "<br/>";
            echo "<span>Fecha 2: </span>";
            echo "<br/>";
            echo "<br/>";
            echo "<span>Día: </span>";
            echo "<select name='dia2' id='dia2'>";
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
            }
            echo "</select>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<span>Mes: </span>";
            echo "<select name='mes2' id='mes2'>";
            foreach ($meses as $key => $value) {
                echo "<option value='" . $key . "'>" . $value . "</option>";
            }
            echo "</select>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<span>Año: </span>";
            echo "<select name='anio2' id='anio2'>";
            for ($i = 1973; $i <= 2023; $i++) {
                echo "<option value='" . $i . "'>" . $i . "</option>";
            }
            echo "</select>";
            if (isset($_POST["btnEnviar"]) && $error_fecha2) {
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<span class='error'>* Fecha introducida no válida. * </span>";
            }
            ?>


            <br /><br />
            <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" />
            </p>

        </div>


    </form>
    <?php
    if (isset($_POST["btnEnviar"]) && !$error_form) {
    ?>
        <div class="resp">
            <h1>Fechas - Respuesta</h1>
            <p>
                <?php
                $tiempo1 = mktime(0, 0, 0, $_POST["mes1"], $_POST["dia1"], $_POST["anio1"]);
                $tiempo2 = mktime(0, 0, 0, $_POST["mes2"], $_POST["dia2"], $_POST["anio2"]);

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