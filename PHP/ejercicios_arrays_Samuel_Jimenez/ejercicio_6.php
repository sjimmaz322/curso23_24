<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 6</h2>";
    echo "<p>Crea un array introduciendo cuidades: Madrid, Barcelona, Londres, Nueva York, Los Ángeles y Chicago, sin asignar índices al array.
    A continuación, muestra el contenido del array haciendo un recorrido diciendo el valor correspondiente a cada índice.</p>";
    //---***---
    $ciudades[] = "Madrid";
    $ciudades[] = "Barcelona";
    $ciudades[] = "Londres";
    $ciudades[] = "Nueva York";
    $ciudades[] = "Los Ángeles";
    $ciudades[] = "Chicago";
    //---
    echo "</p>";
    foreach ($ciudades as $indice => $ciudad) {
        echo "<span>La ciudad con índice " . $indice . " es " . $ciudad . "</span><br/>";
    }
    echo "</p>";
    ?>

</body>

</html>