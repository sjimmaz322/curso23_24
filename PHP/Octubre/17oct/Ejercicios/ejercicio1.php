<?php
if (isset($_POST["btn"])) {
    $error_form = $_POST["numero"] == "" || $_POST["numero"] > 10 || $_POST["numero"] <= 0 || !is_numeric($_POST["numero"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Ficheros Texto</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
<h1>Ejercicio 1</h1>
    <form action="ejercicio1.php" method="post" enctype="multipart/form-data">
        <label for="numero">Introduzca un número entre 1 y 10.</label>
        <br>
        <input type="text" name="numero" id="numero" value="<?php if (isset($_POST["btn"])) echo $_POST["numero"] ?>">
        <br>
        <input type="submit" name="btn" id="btn" value="Dale">
        <?php
        if (isset($_POST["btn"]) && $error_form) {
            if ($_POST["numero"] == "") {
                echo "<br><span> * El campo no puede estar vacío * </span>";
            } else {
                echo "<br><span> * El campo introducido debe ser un número entre 1 y 10 * </span>";
            }
        }
        ?>
    </form>
    <?php
    if (isset($_POST["btn"]) && !$error_form) {
        $nombre_fichero = "tabla_" . $_POST["numero"] . ".txt";
        if (file_exists("Tablas/" . $nombre_fichero)) {
            echo "<p> El fichero ya había sido creado </p>";
        } else {
            @$fd = fopen("Tablas/" . $nombre_fichero, "w");
            if (!$fd)
                die("<span>No se ha podidco crear el fichero " . $nombre_fichero . "</span>");


            for ($i = 1; $i <= 10; $i++) {
                fputs($fd, $i . " x " . $_POST["numero"] . " = " . ($_POST["numero"] * $i) . PHP_EOL);
            }
            fclose($fd);
            echo "<p> Fichero creado con relativo éxito.</p>";
        }
    }
    ?>
</body>

</html>