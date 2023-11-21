<?php
if (isset($_POST["btnConvertir"])) {
    $num = trim($_POST["numero"]);
    $error_vacio = $num == "";
    $error_no_num = is_numeric($num);
    $error_rango = $num < 0 || $num > 4999;

    $error_form = $error_rango || !$error_no_num;
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
    <div class="div1">
        <form action="ejercicio_5.php" method="post" enctype="multipart/form-data">
            <p>Introduza el número romano a convertir en arábico</p>
            <span>Número: </span>
            <input type="text" name="numero" id="numero" value="<?php if (isset($_POST["numero"])) echo $_POST["numero"]; ?>" />
            <?php
            if (isset($_POST["btnConvertir"]) && $error_form) {
                if ($_POST["numero"] == "") {
                    echo "<span> * El campo no puede estar vacío. *</span>";
                } else if (!is_numeric($_POST["numero"])) {
                    echo "<span> * El campo debe ser un número. *</span>";
                } else {
                    echo "<span> * Solo se admiten números menores de 5000 y mayores de 0 *</span>";
                }
            }
            ?>
            <p>
                <input type="submit" id="btnConvertir" name="btnConvertir" value="convertir" />
            </p>
        </form>
    </div>
    <div class="div2">
        <?php
        if (isset($_POST["btnConvertir"]) && !$error_form) {
            $num = $_POST["numero"];
            $arr = array();
            for ($i = 0; $i < strlen($num); $i++) {
            }




            echo "<p>El resultado es: " . $res . "</p>";
        }
        ?>
    </div>
</body>

</html>