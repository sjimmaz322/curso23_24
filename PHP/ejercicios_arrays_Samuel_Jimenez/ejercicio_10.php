<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 10</h2>";
    echo "<p>Rellena un array con los 10 primeros números naturales. Calcula la media de los que están en posiciones pares y muestra los impares por pantalla.</p>";
    //---***---
    $suma = 0;
    $contador = 0;
    $naturales = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    for ($i = 1; $i < count($naturales); $i += 2) {
        $suma += $naturales[$i];
        $contador++;
    }
    $media = $suma / $contador;
    echo "<p>La media de los número pares es: " . $media . "</p>";
    for ($i = 0; $i < count($naturales); $i += 2) {
        echo "<span>" . $naturales[$i] . " es un número impar y está en el array.</span><br/>";
    }
    ?>
</body>

</html>