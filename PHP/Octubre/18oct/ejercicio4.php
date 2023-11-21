<?php
if (isset($_POST["btn"])) {
    $error_nombre = $_FILES["file"]["name"] == "";
    $error_tamanio = $_FILES["file"]["size"] > 2500 * 1024;
    $error_fichero = $_FILES["file"]["error"];
    $error_tipo = $_FILES["file"]["type"] != "text/plain";

    $error_form = $error_nombre || $error_tamanio || $error_fichero || $error_tipo;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <h1>Sube tu fichero de texto</h1>
    <form action="ejercicio4.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="fichero">Seleccione un fichero de texto para contar sus palabras. (Max. 2.5MB):</label>
            <br>
            <input type="file" accept=".txt" name="file" id="file">
            <?php
            if (isset($_POST["btn"]) && $error_form) {
                if ($_FILES["file"]["name"] == "") {
                    echo "<span>* No se ha seleccionado ningún archivo *</span>";
                } else if ($_FILES["file"]["error"]) {
                    echo "<span>* No se ha podido subir el fichero *</span>";
                } else if (getimagesize($_FILES["file"]["size"]) > 2500 * 1024) {
                    echo "<span>* El fichero seleccionado es demasiado grande*</span>";
                } else {
                    echo "<span>* El archivo seleccionado no tiene un formato válido *</span>";
                }
            }
            ?>
        </p>
        <p>
            <input type="submit" name="btn" id="btn" value="Contar las Palabras">
        </p>
        <?php
        if (isset($_POST["btn"]) && !$error_form) {
            // --- Así es una forma ---
            $contenido = file_get_contents($_FILES["file"]["tmp_name"]);
            echo "<h3>El número de palabras que contiene el archivo seleccionado es de: " . str_word_count($contenido) . " (Contando saltos de línea como palabras)</h3>";

            // --- Así es otra forma --- Resulta ser más exacto
            $fd = fopen($_FILES["file"]["tmp_name"], "r");
            if (!$fd) {
                die("<p>No se puede abrir el fichero.</p>");
            }
            $n_palabras = 0;
            while ($linea = fgets($fd)) {
                $n_palabras += str_word_count($linea);
            }
            echo "<h3>El número de palabras que contiene el archivo seleccionado es de: " . $n_palabras . " </h3>";
        }
        fclose($fd);
        ?>
    </form>
</body>

</html>
