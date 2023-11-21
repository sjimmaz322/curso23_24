<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection to DB</title>
    <style>
        .error {
            color: red;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        th {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <?php
    try {
        $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_teoria");
        mysqli_set_charset($conexion, "utf8");
    } catch (Exception $e) {
        die("<p class='error'> * No se ha podido conectarse a la base de datos: " . $e->getMessage() . " *</p>mysqli_close($conexion);</body></html>");
    }
    $consulta_alumnos = "select * from t_alumnos";
    try {
        $datos_alumnos = mysqli_query($conexion, $consulta_alumnos);
    } catch (Exception $e) {
        die("<p class='error'> * No se ha podido realizar la operación: " . $e->getMessage() . " * </p>mysqli_close($conexion);</body></html>");
    }

    $n_tuplas = mysqli_num_rows($datos_alumnos);

    echo "<p>El número de tuplas obtenidas ha sido de: " . $n_tuplas . ".</p>";

    //Mete en $alumno un array asociativo por columnas.
    $alumno = mysqli_fetch_assoc($datos_alumnos);
    echo "<p>";
    foreach ($alumno as $key => $value) {
        echo "<span>" . $key . " - " . $value . "</span><br/>";
    }
    echo "</p>";
    //var_dump($alumno);

    //Mete en $alumno un array escalar por columnas.
    $alumno = mysqli_fetch_row($datos_alumnos);
    echo "<p>El segundo alumno tiene el nombre de: " . $alumno[1] . "</p>";

    //Mete en $alumno los datos de ambas formas
    $alumno = mysqli_fetch_array($datos_alumnos);
    echo "<p>El tercer alumno tiene el nombre de: " . $alumno[1] . " (escalar) - " . $alumno["nombre"] . " (asociativo)</p>";

    //Hay que volver al inicio porque solo hay 3 alumnos
    //Permite irte a cualquier posición, no solo a la primera
    mysqli_data_seek($datos_alumnos, 0);
    /*

    //Mete en $alumno los datos en un objeto
    $alumno = mysqli_fetch_object($datos_alumnos);
    echo "<p>El primer alumno tiene el nombre de: " . $alumno->nombre . "</p>";
    */

    //Vamos a mostar todos los datos en una tabla.

    echo "<table>";
    echo "<tr><th>Código</th><th>Nombre</th><th>Teléfono</th><th>Cód. Postal</th></tr>";
    while ($alumno = mysqli_fetch_assoc($datos_alumnos)) {
        echo "<tr>";
        foreach ($alumno as $key => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    mysqli_free_result($datos_alumnos);

    mysqli_close($conexion);
    ?>

</body>

</html>