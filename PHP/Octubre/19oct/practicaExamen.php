<!-- Formulario, meta palabra y te diga "Se repiten caracteres" o "No se repiten carácteres". --->
<?php
if (isset($_POST["btn"])) {

    $error_vacio = $_POST["txt"] == "";
    $error_num = is_numeric($_POST["txt"]);
    $error_len = strlen($_POST["txt"]) < 3;

    $error_form = $error_len || $error_vacio || $error_num;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipo Examen</title>
</head>

<body>
    <form action="practicaExamen.php" method="post" enctype="multipart/form-data">
        <h1>Formulario</h1>
        <p>
            <lable for="txt">Introduzca una palabra</lable>
            <input type="text" id="txt" name="txt" value="<?php if (isset($_POST["txt"])) echo $_POST["txt"] ?>">
            <?php
            if (isset($_POST["btn"]) && $error_form) {
                if ($_POST["txt"] == "") {
                    echo "<span> * El campo no puede dejarse vacio *</span>";
                } else if (strlen($_POST["txt"]) < 3) {
                    echo "<span> * El campo debe tener al menos 3 caracteres *</span>";
                } else {
                    echo "<span> * El campo no puede ser numérico *</span>";
                }
            }
            ?>
        </p>

        <input type="submit" name="btn" id="btn" value="Comprobar">
    </form>
    <?php
    if (isset($_POST["btn"]) && !$error_form) {
        //$palabro = strtoupper($_POST["txt"]);
        $palabro = ($_POST["txt"]);
        $se_repite = false;
        for ($i = 0; $i < strlen($palabro); $i++) {
            $letra = $palabro[$i];
            for ($j = $i + 1; $j < strlen($palabro); $j++) {
                if ($palabro[$j] == $letra) {
                    $se_repite = true;
                    break;
                }
            }
        }

        echo "<h2>Resultado</h2>";
        echo "<h3>¿Se repiten caracteres?</h3>";

        echo "<p>";
        if ($se_repite) {
            echo "<span> En '" . $palabro . "' se repite.</span>";
        } else {
            echo "<span> En '" . $palabro . "' no se repite.</span>";
        }
        echo "</p>";
    }
    ?>

</body>

</html>