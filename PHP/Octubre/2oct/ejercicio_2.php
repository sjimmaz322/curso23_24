<?php
$error_form = false;
if (isset($_POST["btnComprobar"])) {
    $texto = trim($_POST["txt"]);
    $error_txt = $texto == "";
    $error_l_txt = strlen($texto) < 3;

    $error_form = $error_txt || $error_l_txt;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        .cabecera {
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="div1">
        <form action="ejercicio_2.php" method="post" enctype="multipart/form-data">
            <h2 class="cabecera">Palíndromos / Capicúas - Formulario</h2>
            <p>Dime una palabra o un número y te diré si es un palíndromo o un número capicúa.</p>
            <p> Palabra o número: <input type="text" id="txt" name="txt" value='<?php if (isset($_POST["txt"])) echo $_POST["txt"]; ?>' />
                <?php
                if (isset($_POST['btnComprobar']) && $error_form) {
                    if ($_POST["txt"] == "") {
                        echo "<span> El campo no puede ir vacío. </span>";
                    } else {
                        echo "<span> El campo no puede tener una longitud menor que 3. </span>";
                    }
                } ?>
            </p>
            <input type="submit" id="btnComprobar" name="btnComprobar" value="Comparar">
        </form>
    </div>
    <?php
    if ((isset($_POST['btnComprobar'])) && !$error_form) {
        $texto_m = strtoupper($texto);

        $i = 0;
        $j = strlen($texto) - 1;
        $exito = true;

        while ($i < $j && $exito) {
            if ($texto_m[$i] == $texto_m[$j]) {
                $i++;
                $j--;
            } else {
                $exito = false;
            }
        }
        echo "<div class='div2'";
        echo "<h2 class='cabecera'> Palíndromos / Capicúas - Respuesta</h2>";
        if (is_numeric($texto)) {
            if ($exito) {
                echo "<p>" . $texto  . "es capicúa</p>";
            } else {
                echo "<p>" . $texto  . "no es capicúa</p>";
            }
        } else {
            if ($exito) {
                echo "<p>" . $texto . "es palíndromo</p>";
                echo "<p>" . $texto . "no es palíndromo</p>";
            }
        }
        echo "</div>";
    }
    ?>
</body>

</html>