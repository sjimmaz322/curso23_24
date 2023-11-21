<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
    <style>
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 15</h2>";
    echo "<p>Implementa un array asociativo y ordénalo de menor a mayor. Muestra los resultados en una tabla.</p>";
    //---***---
    $numeros = array(3, 2, 8, 123, 5, 1);
    sort($numeros);
    echo "<table>";
    foreach ($numeros as $index => $num) {
        echo "<tr>";
        echo "<td><p>" . $index . "</p></td>";
        echo "<td><p>" . $num . "</p></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>