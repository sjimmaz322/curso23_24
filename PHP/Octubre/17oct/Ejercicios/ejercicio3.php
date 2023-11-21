<?php
if (isset($_POST["btn"])) {
    $error_numero = $_POST["numero"] == "" || $_POST["numero"] > 10 || $_POST["numero"] <= 0 || !is_numeric($_POST["numero"]);
    $error_linea = $_POST["linea"] == "" || $_POST["linea"] > 10 || $_POST["linea"] <= 0 || !is_numeric($_POST["linea"]);
    //
    $error_form = $error_numero || $error_linea;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <h1>Ejercicio 3</h1>
    <form action="ejercicio3.php" method="post" enctype="multipart/form-data">
        <label for="numero">Introduzca un número entre 1 y 10.</label>
        <br>
        <input type="text" name="numero" id="numero" value="<?php if (isset($_POST["btn"])) echo $_POST["numero"] ?>">
        <?php
        if (isset($_POST["btn"]) && $error_numero) {
            if ($_POST["numero"] == "") {
                echo "<span> * El campo no puede estar vacío * </span>";
            } else {
                echo "<span> * El campo introducido debe ser un número entre 1 y 10 * </span>";
            }
        }
        ?>
        <br><br>
        <label for="linea">Introduzca la linea a comprobar.</label>
        <br>
        <input type="text" name="linea" id="linea" value="<?php if (isset($_POST["btn"])) echo $_POST["linea"] ?>">

        <?php
        if (isset($_POST["btn"]) && $error_linea) {
            if ($_POST["linea"] == "") {
                echo "<span> * El campo no puede estar vacío * </span>";
            } else {
                echo "<span> * El campo introducido debe ser un número entre 1 y 10 * </span>";
            }
        }
        ?>
        <br>
        <input type="submit" name="btn" id="btn" value="Dale">
    </form>

    <?php
    if (isset($_POST["btn"]) && !$error_form) {
        echo "<h2>Linea " . $_POST["linea"] . " de la tabla del " . $_POST["numero"] . "</h2>";
        $nombre_fichero = "tabla_" . $_POST["numero"] . ".txt";
        $ruta = "Tablas/" . $nombre_fichero;
        if (file_exists($ruta)) {
            //
            $fd = fopen($ruta, "r");
            for ($i = 0; $i < $_POST["linea"]; $i++) {
                $linea = fgets($fd);
            }
            echo $linea;
            fclose($fd);
        } else {
            //
            echo "<p> * El archivo no existe o ha sido movido de la ruta dada *";
        }
    }
    ?>


</body>

</html>