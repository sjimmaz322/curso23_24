<?php
// define("CNTS", array());
const VALOR = array("M" => 1000, "D" => 500, "C" => 100, "L" => 50, "X" => 10, "V" => 5, "I" => 1);

function es_correcto_romano($texto)
{
    function letras_bien($texto)
    {
        $bien = true;
        for ($i = 0; $i < strlen($texto); $i++) {

            if (!isset(VALOR[$texto[$i]])) {
                $bien = false;
                break;
            }
        }
        return $bien;
    }
    function orden_bueno($texto)
    {
        $bien = true;
        for ($i = 0; $i < strlen($texto) - 1; $i++) {
            if (VALOR[$texto[$i]] < VALOR[$texto[$i + 1]]) {
                $bien = false;
                break;
            }
        }
        return $bien;
    }
    function repite_bien($texto)
    {
        $veces = array("M" => 4, "D" => 1, "C" => 4, "L" => 1, "X" => 4, "V" => 1, "I" => 4);
        $bien = true;
        for ($i = 0; $i < strlen($texto); $i++) {
            $veces[$texto[$i]]--;
            if ($veces[$texto[$i]] == -1) {
                $bien = false;
                break;
            }
        }
        return $bien;
    }

    return letras_bien($texto) && orden_bueno($texto) && repite_bien($texto);
}
if (isset($_POST["btnConvertir"])) {

    $texto = trim($_POST["texto"]);
    $error_vacio = $texto == "";
    $texto_m = strtoupper($texto);

    $error_form = $error_vacio || !es_correcto_romano($texto_m);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Romani Ite Domun</title>
    <style>
        .div1 {
            width: 50%;
            background-color: #c1d6df;
            border: 1px solid black;
            margin-left: 25px;
            padding-left: 25px;
        }

        .div2 {
            width: 50%;
            background-color: #d4f4d4;
            border: 1px solid black;
            margin-left: 25px;
            padding-left: 25px;
        }
    </style>
</head>

<body>
    <form action="ejercicio_4.php" method="post" enctype="multipart/form-data">
        <div class="div1">
            <p>Dime un número romano y lo convertiré a carácteres árabes.</p>
            <p>
                <span>Frase: </span><input type="text" id="texto" name="texto" value='<?php if (isset($_POST["texto"])) echo $_POST["texto"]; ?>'></input>
                <?php
                if (isset($_POST["btnConvertir"]) && $error_form) {
                    if ($_POST["texto"] == "") {
                        echo "<span>Campo vacío</span>";
                    } else {
                        echo "<span>No se ha escrito un número romano correcto.</span>";
                    }
                }
                ?>
            <p>
            <input type="submit" id="btnConvertir" name="btnConvertir" value="convertir" />
            </p>
            </p>
        </div>
    </form>
    <div class="div2">
        <?php

        if (isset($_POST["btnConvertir"]) && !$error_form) {
            $res = 0;
            for ($i = 0; $i < strlen($texto_m); $i++) {
                $res += VALOR[$texto_m[$i]];
            }
            echo "<p>El número romano <strong>(" . $texto_m . ")</strong> pasado a letras árabes es " . $res . "</p> ";
        }
        ?>
    </div>
</body>

</html>