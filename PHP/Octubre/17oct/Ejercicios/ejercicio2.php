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
    <title>Ejercicio 2</title>
</head>

<body>
    <h1>Ejercicio 2</h1>
    <form action="ejercicio2.php" method="post" enctype="multipart/form-data">
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
        echo "<h2>Tabla del " . $_POST["numero"] . "</h2>";
        $nombre_fichero = "tabla_" . $_POST["numero"] . ".txt";
        $ruta = "Tablas/" . $nombre_fichero;
        if (file_exists($ruta)) {
            //
            $fd = fopen($ruta, "r");
            $todo_fichero = file_get_contents($ruta);
            echo nl2br($todo_fichero);
            fclose($fd);
        } else {
            //
            echo "<p> * El archivo no existe o ha sido movido de la ruta dada *";
        }
    }
    ?>
</body>

</html>