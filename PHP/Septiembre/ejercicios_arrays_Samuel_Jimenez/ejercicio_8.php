<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 8</h2>";
    echo "<p>Crea un array con los nombres Pedro, Ismael, Sonia, Clara, Susana, Alfonso y Teresa.
        Muestra el número de elementos que contiene y cada elemento en una lista no numerada.</p>";
    //---***---
    $nombres[] = "Pedro";
    $nombres[] = "Ismael";
    $nombres[] = "Sonia";
    $nombres[] = "Clara";
    $nombres[] = "Susana";
    $nombres[] = "Alfonso";
    $nombres[] = "Teresa";
    //---
    echo "<p>El array 'nombres' contiene: " . sizeof($nombres) . " elementos.</p>";
    echo "<ul>";
    foreach ($nombres as $index => $nombre) {
        echo "<li>" . $nombre . "</li>";
    }
    echo "</ul>";
    ?>
</body>

</html>