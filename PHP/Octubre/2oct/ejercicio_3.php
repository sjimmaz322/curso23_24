<?php
$error_frase = false;
if (isset($_POST["btnComprobar"])) {
    $frase = trim($_POST["txt"]);
    $error_frase = $frase == "";
}
function myStringReplace($palabro)
{
    $res = "";
    $i = 0;
    while ($i < strlen($palabro)) {
        if ($palabro[$i] != " ") {
            $res .= $palabro[$i];
        }
        $i++;
    }
    return $res;
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
    <form action="ejercicio_3.php" method="post" enctype="multipart/form-data">
        <div class="div1">
            <h2 class='cabecera'>Frases palíndromas - Formulario</h2>
            <p>Dime una frase y te diré si es una frase palíndroma</p>
            <p>Frase: <input type="text" id="txt" name="txt" value='<?php if (isset($_POST["txt"])) echo $_POST["txt"]; ?>' />
                <?php
                if ($error_frase) {
                    echo "<span> * El campo no se puede dejar vacío *";
                }
                
                ?>
            </p>
            <input type="submit" name="btnComprobar" id="btnComprobar" value="Comprobar" />
        </div>
        <br />
        <?php
        if ((isset($_POST['btnComprobar'])) && !$error_frase) {
            echo "<div class='div2'";
            echo " <h2 class='cabecera'>Frases palíndromas - Resultado</h2>";
            echo "<p>" . $_POST['txt'] . "</p>";
            $sin_espacios = myStringReplace($_POST['txt']);
            $texto_m = strtoupper($sin_espacios);

            $i = 0;
            $j = strlen($texto_m) - 1;
            $exito = true;

            while ($i < $j && $exito) {
                if ($texto_m[$i] == $texto_m[$j]) {
                    $i++;
                    $j--;
                } else {
                    $exito = false;
                }
            }
            if ($exito) {
                echo "<p>Es palíndroma</p>";
            } else {
                echo "<p>No es palíndroma</p>";
            }
        }
        ?>
    </form>
</body>

</html>