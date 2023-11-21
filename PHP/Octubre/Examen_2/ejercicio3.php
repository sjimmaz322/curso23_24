<?php
function mySep($texto, $separador)
{
    $ini = 0;
    $fin = 0;
    $palabro = "";
    $arr = [];
    while (isset($texto[$ini])) {
        if ($texto[$ini] != $separador) {
            $fin = $ini + 1;
            $palabro .= $texto[$ini];
            while (isset($texto[$fin]) && $texto[$fin] != $separador) {
                $palabro .= $texto[$fin];
                $fin++;
            }
            $arr[] = $palabro;
            $palabro = "";
            $ini = $fin;
        } else {
            $ini++;
        }
    }
    return $arr;
}
//
if (isset($_POST["btn"])) {
    $error_txt = $_POST["txt"] == "";
    $error_des = !is_numeric($_POST["des"]) || $_POST["des"] < 0 || $_POST["des"] >= 26;
    $error_file = $_FILES["file"]["name"] != "claves_cesar.txt" || $_FILES["file"]["size"] > 1250 * 1024 || $_FILES["file"]["type"] != "text/plain" || $_FILES["file"]["error"];

    $error_form = $error_txt || $error_des || $error_file;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3. Codifica una frase.</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="ejercicio3.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="txt">Introduzca un texto: </label>
            <input type="text" id="txt" name="txt" value="<?php if (isset($_POST["txt"])) echo $_POST["txt"] ?>" />
            <?php
            if (isset($_POST["btn"]) && $error_form) {
                if ($error_txt) {
                    echo "<span class='error'> * No se puede dejar vacío * </span>";
                }
            }
            ?>
        </p>
        <p>
            <label for="des">Desplazamiento: </label>
            <input type="txt" id="des" name="des" value="<?php if (isset($_POST["des"])) echo $_POST["des"] ?>" />
            <?php
            if (isset($_POST["btn"]) && $error_form) {
                if ($error_des) {
                    if (!is_numeric($_POST["des"])) {
                        echo "<span class='error'> * Debe introducirse un número * </span>";
                    } else {
                        if (($_POST["des"]) < 0) {
                            echo "<span class='error'> * Debe introducirse un número positivo * </span>";
                        }
                        if (($_POST["des"]) >= 26) {
                            echo "<span class='error'> * Debe introducirse un número menor de 26 * </span>";
                        }
                    }
                }
            }
            ?>
        </p>
        <p>
            <label for="txt">Seleccione el archivo de claves (.txt y menor de 1'25MB): </label>
            <input type="file" id="file" name="file" accept=".txt" />
            <?php
            if (isset($_POST["btn"]) && $error_form) {
                if ($_FILES["file"]["name"] != "claves_cesar.txt") {
                    echo "<span class='error'> * Debe seleccionar el archivo especificado * </span>";
                } else if ($_FILES["file"]["size"] > 1250 * 1024) {
                    echo "<span class='error'> * El archivo tiene el nombre correcto pero es demasiado grande * </span>";
                } else if ($_FILES["file"]["type"] != "text/plain") {
                    echo "<span class='error'> * El archivo no tiene el formato correcto * </span>";
                } else {
                    echo "<span class='error'> * Ha ocurrido un error inesperado * </span>";
                }
            }
            ?>
        </p>
        <p>
            <button type="submit" id="btn" name="btn">Codificar</button>
        </p>
    </form>
    <?php
    if (isset($_POST["btn"]) && !$error_form) {
        echo "<h2>Resultado</h2>";

        $resultado = codificar($_POST["txt"], $_POST["des"]);

        echo "<span>El texto introducido codificado sería</span><br/>";
        echo "<span>" . $resultado . "</span>";
    }

    function codificar($texto, $desplazamiento)
    {
        $codificado = "";
        @$fd = fopen($_FILES["file"]["tmp_name"], "r");
        if (!$fd) {
            die("No se ha podido abrir el archivo, compruebe el código");
        } else {
            for ($i = 0; $i < strlen($texto); $i++) {
                if ($texto[$i] != " ") {
                    $letra = strtoupper($texto[$i]);
                    while (fgets($fd)) {
                        $linea = mySep(fgets($fd), ";");
                        if ($letra == $linea[0]) {
                            $letra = $linea[$desplazamiento];
                            $codificado .= $letra;
                        } else {
                            fgets($fd);
                        }
                    }
                    fseek($fd, 0);
                }
            }
            return $codificado;
        }
    }
    ?>
</body>

</html>