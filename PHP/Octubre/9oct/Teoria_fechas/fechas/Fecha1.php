<?php
if (isset($_POST["btnEnviar"])) {
    //errores de fec1
    $buenos_separadores1 = substr($_POST["fec1"], 2, 1) == "/" && substr($_POST["fec1"], 5, 1) == "/";
    $numeros_buenos1 = is_numeric(substr($_POST["fec1"], 0, 2)) && is_numeric(substr($_POST["fec1"], 3, 2)) && is_numeric(substr($_POST["fec1"], 6, 4));
    $fecha_valida1 = checkdate(substr($_POST["fec1"], 3, 2), substr($_POST["fec1"], 0, 2), substr($_POST["fec1"], 6, 4));
    $error_fecha1 =  $_POST["fec1"] == "" || strlen($_POST["fec1"]) != 10 || !$buenos_separadores1 || !$numeros_buenos1 || !$fecha_valida1;
    //errores de fec2
    $buenos_separadores1 = substr($_POST["fec2"], 2, 1) == "/" && substr($_POST["fec2"], 5, 1) == "/";
    $array_num2 = explode("/", $_POST["fec2"]);
    $numeros_buenos2 = is_numeric($array_num2[0]) && is_numeric($array_num2[1]) && is_numeric($array_num2[2]);
    $fecha_valida2 = checkdate($array_num2[1], $array_num2[0], $array_num2[2]);
    $error_fecha2 = $_POST["fec2"] == "" || strlen($_POST["fec2"]) != 10  || !$buenos_separadores2 || !$numeros_buenos2 || !$fecha_valida2;
    //--
    $error_form = $error_fecha1 || $error_fecha2;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha 1</title>
    <style>
        .div1 {
            background-color: lightblue;
            border: 1px solid black;
            padding-left: 25px;

        }

        .div2 {
            background-color: lightgreen;
            border: 1px solid black;
            padding-left: 25px;

        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="div1">
        <h1>Fechas - Formulario</h1>
        <form action="Fecha1.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="fec1">Introduzca una fecha: (DD/MM/YYYY)</label>
                &nbsp;
                <input type="text" name="fec1" id="fec1" value="<?php if (isset($_POST["fec1"])) echo $_POST["fec1"]; ?>" />

                <br />
                <label for="fec2">Introduzca una fecha: (DD/MM/YYYY)</label>
                &nbsp;

                <input type="text" name="fec2" id="fec2" value="<?php if (isset($_POST["fec2"])) echo $_POST["fec2"]; ?>" />
                <br />
                <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar" />
            </p>
        </form>
    </div>
    <?php
    if (isset($_POST["btnEnviar"]) && !$error_form) {
    }
    ?>
</body>

</html>