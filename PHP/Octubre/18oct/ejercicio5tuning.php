<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            width: 90%;
            margin: 0 auto;
        }

        caption {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <form action="ejercicio5tuning.php" method="post" enctype="multipart/form-data">
        <h2>Seleccione el país del que desea conocer el PIB desde 2020</h2>
        <label for="pais">Seleccione el país: </label>
        <?php



        $fd = fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt", "r");
        if (!$fd) {
            die("<p>No se puede abrir el fichero.</p>");
        }
        echo "<select name='pais' id='pais'>";
        $linea = fgets($fd);
        while ($linea = fgets($fd)) {
            $datos_linea = explode("\t", $linea);
            $initials = explode(",", $datos_linea[0]);
            $initial = end($initials);
            echo "<option>" . $initial . "</option>";
        }
        echo "</select>";
        fclose($fd);

        ?>
    </form>
</body>

</html>