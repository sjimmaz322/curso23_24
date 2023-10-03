<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 7</h2>";
    echo "<p>Repite el ejercicio anterior pero ahora si se han de crear índices.</p>";
    //---***---
    $ciudades2["MD"] = "Madrid";
    $ciudades2["B"] = "Barcelona";
    $ciudades2["L"] = "Londres";
    $ciudades2["NY"] = "Nueva York";
    $ciudades2["LA"] = "Los Ángeles";
    $ciudades2["C"] = "Chicago";
    //---
    echo "</p>";
    foreach ($ciudades2 as $indice2 => $ciudad2) {
        echo "<span>El índice del array que contiene como valor " . $ciudad2 . " es " . $indice2 . "</span><br/>";
    }
    echo "</p>";
    ?>
</body>

</html>