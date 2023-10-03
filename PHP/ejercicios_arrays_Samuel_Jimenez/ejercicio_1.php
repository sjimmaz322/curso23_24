<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 1</h2>";
    echo "<p>Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea.</p>";
    //---***---
    function generarPares()
    {
        for ($i = 2; $i <= 20; $i += 2) {
            $numPares[] = $i;
        }
        return $numPares;
    }
    $pares = generarPares();
    foreach ($pares as $num => $value) {
        echo $value . "</br>";
    }
    ?>
</body>

</html>