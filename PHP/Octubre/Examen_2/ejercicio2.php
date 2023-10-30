<?php
if (isset($_POST["btn"])) {
    $error_txt = $_POST["txt"] == "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2. Contar palabras sin las vocales (a,e,i,o,u,A,E,I,O,U)</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="ejercicio2.php" method="post" enctype="multipart/form-data">
        <p>
        <h2>Ejercicio 2. Contar palabras sin las vocales (a,e,i,o,u,A,E,I,O,U)</h2>
        <lable for="txt">Introduzca el texto: </lable>
        <input type="text" name="txt" id="txt" value="<?php if (isset($_POST["txt"])) echo $_POST["txt"] ?>">
        <?php
        if (isset($_POST["btn"]) && $error_txt) {
            echo "<span class='error'> * El campo no puede estar vacío * </span>";
        }
        ?>
        </p>
        <p>
            <label for="sep">Elija el separador</label>
            <select id="sep" name="sep">
                <?php
                if ($_POST["sep"] == ",") {
                    echo "<option value=',' selected >Coma</option>";
                } else {
                    echo "<option value=','>Coma</option>";
                }
                if ($_POST["sep"] == ";") {
                    echo " <option selected value=';'>Punto y coma</option>";
                } else {
                    echo " <option value=';'>Punto y coma</option>";
                }
                if ($_POST["sep"] == " ") {
                    echo " <option selected value=' '>Espacio</option>";
                } else {
                    echo " <option value=' '>Espacio</option>";
                }
                if ($_POST["sep"] == ":") {
                    echo " <option selected value=':'>Dos puntos</option>";
                } else {
                    echo " <option value=':'>Dos puntos</option>";
                }

                ?>
            </select>
        </p>
        <button type="submit" id="btn" name="btn">Contar</button>
    </form>
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
    function comprobar($palabra, $array)
    {
        $cuenta = true;
        for ($i = 0; $i < strlen($palabra); $i++) {
            $letraPalabra = $palabra[$i];
            for ($j = 0; $j < count($array); $j++) {
                if ($letraPalabra == $array[$j]) {
                    $cuenta = false;
                    break;
                }
            }
        }
        return $cuenta;
    }

    if (isset($_POST["btn"]) && !$error_txt) {
        $contador = 0;
        echo "<h2>Resultado</h2>";
        $prohibidas = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];

        $myArr = mySep($_POST["txt"], $_POST["sep"]);
        foreach ($myArr as $key => $value) {
            if (comprobar($value, $prohibidas)) {
                $contador++;
            }
        }
        echo "<p>El texto '" . $_POST["txt"] . "', con el separador '" . $_POST["sep"] . "' contiene " . $contador . " palabras.</p>";
    }
    ?>
</body>

</html>