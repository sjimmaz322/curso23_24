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
    <table>
        <caption>PIB per cápita de los paises de la Unión Europea</caption>
        <?php

        use function PHPSTORM_META\type;

        $fd = fopen("http://dwese.icarosproject.com/PHP/datos_ficheros.txt", "r");
        if (!$fd) {
            die("<p>No se puede abrir el fichero.</p>");
        }
        $linea = fgets($fd);
        $datos_linea = explode("\t", $linea);
        $n_columnas = count($datos_linea);

        echo "<tr>";
        for ($i = 0; $i < $n_columnas; $i++) {
            echo "<th>" . $datos_linea[$i] . "</th>";
        }

        echo "</tr>";

        while ($linea = fgets($fd)) {
            $datos_linea = explode("\t", $linea);
            echo "<tr>";
            $initials = explode(",", $datos_linea[0]);
            $initial = end($initials);
            echo "<th>" . $initial . "</th>";

            for ($i = 1; $i < $n_columnas; $i++) {
                if (isset($datos_linea[$i])) {

                    echo "<td>" . $datos_linea[$i] . "</td>";
                } else {

                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        fclose($fd);

        ?>
    </table>
</body>

</html>