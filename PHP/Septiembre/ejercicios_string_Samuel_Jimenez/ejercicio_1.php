<?php

$error_form = false;
if (isset($_POST["btnComparar"])) { //Miro si hay errores
    $texto1 = trim($_POST["texto1"]);
    $texto2 = trim($_POST["texto2"]);
    $l_texto1 = strlen($_POST["texto1"]);
    $l_texto2 = strlen($_POST["texto2"]);
    $error_text1 = trim($texto1 == "" || $l_texto1 < 3);
    $error_text2 = trim($texto2 == "" || $l_texto2 < 3);
    $error_form = $error_text1 || $error_text2;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <style>
        .div1 {
            width: 30%;
            background-color: #c1d6df;
            border: 1px solid black;
            margin-left: 25px;
            padding-left: 25px;
        }

        .div2 {
            width: 30%;
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
    <form action="ejercicio_1.php" method="post" enctype="multipart/form-data">

        <h1>Ejercicio 1 </h1>
        <p>Escribe un formulario que pida dos palabras y diga si riman o no. Si
            coinciden las tres últimas letras tiene que decir que riman. Si coinciden sólo
            las dos últimas tiene que decir que riman un poco y si no, que no riman.</p>
        </br>
        <div class='div1'>
            <h2 class='cabecera'>Ripios - Formulario</h2>
            <p class='contenedor'>

            <p>Dime dos palabras y te diré si riman o no</p>
            <p>
                <label for='texto1'>Primera palabra:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                <input type='text' id='texto1' name='texto1' value='<?php if (isset($_POST['texto1'])) echo $texto1 ; ?>' />
                <?php
                if (isset($_POST['btnComparar']) && $error_text1) {
                    if ($texto1 == "") {
                        echo "<span class='error'> Campo Vacío </span>";
                    } else {
                        echo "<span class='error'> El campo debe tener al menos 3 letras </span>";
                    }
                }
                ?>

            </p>
            <p>
                <label for='texto2'>Segunda palabra:</label>&nbsp;&nbsp;&nbsp;
                <input type='text' id='texto2' name='texto2' value='<?php if (isset($_POST['texto2'])) echo $texto2; ?>' />
                <?php
                if (isset($_POST['btnComparar']) && $error_text2) {
                    if ($texto2 == "") {
                        echo "<span class='error'> Campo Vacío </span>";
                    } else {
                        echo "<span class='error'> El campo debe tener al menos 3 letras </span>";
                    }
                }
                ?>
            </p>
            <input type='submit' id='btnComparar' name='btnComparar' value='Comparar' />

            </p>

        </div>

        <?php
        if ((isset($_POST['btnComparar'])) && !$error_form) {
            $texto1_2 = strtoupper($texto1);
            $texto2_2 = strtoupper($texto2);

            $respuesta = $texto1_2 . " y " . $texto2_2 . " no riman";
            if ($texto1_2[$l_texto1 - 1] == $texto2_2[$l_texto2 - 1] && $texto1_2[$l_texto1 - 2] == $texto2_2[$l_texto2 - 2]) {
                $respuesta = $texto1_2 . " y " . $texto2_2 . " riman un poco";
                if ($texto1_2[$l_texto1 - 3] == $texto2_2[$l_texto2 - 3]) {
                    $respuesta = $texto1_2 . " y " . $texto2_2 . " riman";
                }
            }
            echo "<br/>";
            echo "<br/>";
            echo "<div class='div2'>";
            echo "<h2>Ripios - Respuesta</h2>";
            echo "<p>$respuesta</p>";
            echo "</div>";
        }
        ?>
    </form>
</body>

</html>