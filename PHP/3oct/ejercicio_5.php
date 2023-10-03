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
            $positions = [];
            $res = "";
            for ($i = 0; $i < strlen($num) - 1; $i++) {
                $positions[$i] = $num[$i];
            }
            switch (count($positions)) {
                case 1:
                    switch ($positions[0]) {
                        case "1":
                            $res = "I";
                            break;
                        case 2:
                            $res = "II";
                            break;
                        case 3:
                            $res = "III";
                            break;
                        case 4:
                            $res = "IV";
                            break;
                        case 5:
                            $res = "V";
                            break;
                        case 6:
                            $res = "VI";
                            break;
                        case 7:
                            $res = "VII";
                            break;
                        case 8:
                            $res = "VIII";
                            break;
                        case 9:
                            $res = "IX";
                            break;
                        case 10:
                            $res = "X";
                            break;
                    }
                    break;
                case 2:
                    # code...
                    break;
                case 3:
                    # code...
                    break;
                case 4:
                    # code...
                    break;
            }
            echo "<p>El resultado es: " . $res . "</p>";
        }
        ?>
    </div>
</body>

</html>