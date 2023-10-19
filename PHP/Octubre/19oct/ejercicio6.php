<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
    <style>
        table,
        td,
        tr,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            margin: 0 auto;
            text-align: center;
        }

        caption {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <form action="ejercicio6.php" method="post" enctype="multipart/form-data">
        <h2>Seleccione el país del que desea conocer el PIB desde 2020</h2>
        <label for="pais">Seleccione el país: </label>
        <?php



        $fd = fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt", "r");
        if (!$fd) {
            die("<p>No se puede abrir el fichero.</p>");
        }
        echo "<select name='pais' id='pais'>";
        $primera_fila = fgets($fd);
        while ($linea = fgets($fd)) {
            $datos_linea = explode("\t", $linea);
            $initials = explode(",", $datos_linea[0]);
            $initial = end($initials);

            if (isset($_POST["pais"]) && $_POST["pais"] == $initial) {
                $datos_pais_seleccionado = $datos_linea;
            }

            if (isset($_POST["pais"]) && $_POST["pais"] == $initial) {
                echo "<option selected value='" . $initial . "'>" . $initial . "</option>";
            }
            echo "<option>" . $initial . "</option>";
        }
        echo "</select>";





        fclose($fd);

        ?>
        <input type="submit" name="btn" id="btn" value="Comprobar">
    </form>
    <?php

    if (isset($_POST["btn"])) {
        echo "<h2>PIB de " . $_POST["pais"] . "</h2>";
        $datos_primera_fila = explode("\t", $primera_fila);
        $n_anios = count($datos_primera_fila);

        echo "<table>";
        echo "<tr>";
        for ($i = 1; $i < $n_anios; $i++) {
            echo "<th>" . $datos_primera_fila[$i] . "</th>";
        }
        echo "</tr>";
        echo "<tr>";
        for ($i = 1; $i < $n_anios; $i++) {
            if (isset($datos_pais_seleccionado[$i])) {
                echo "<td>" . $datos_pais_seleccionado[$i] . "</td>";
            } else {
                echo "<td></td>";
            }
        }
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>

</html>