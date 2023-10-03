<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 2</h2>";
    echo "<p>Imprime los valores de array asociativo siguiente (Está en el código) usando la estructura de control foreach. </p>";
    //---***---
    $v[1] = 90;
    $v[30] = 7;
    $v['e'] = 99;
    $v['hola'] = 43;
    echo "<p>";
    foreach ($v as $indice => $valor) {
        echo "<span>El valor de: " . $indice . " es " . $valor . "</span></br>";
    }
    echo "</p>";
    ?>
</body>

</html>