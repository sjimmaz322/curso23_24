<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primera web PHP</title>
</head>
<h1>Estamos a <?php echo date("d-m-Y"); ?></h1>

<body>
    <!-- Para declarar una variable se pone $ y el nombre-->
    <!-- Se concatenan las cosas con un punto (.) -->
    <!-- Podemos concatear sin punto dentro del p -->
    <?php

    $a = 8;
    $b = 9;
    $c = $a + $b;

    //Definimos constantes
    define("PI", 3.1415);
    echo "<h1>Esta es mi primera página del curso 2023-2024</h1>";
    echo "<p>El resultado de sumar a y b es: " . $c . "</p>";
    echo "<p>El resultado de sumar " . $a . " + " . $b . " es " . $c . "</p>";

    ?>

    <!-- vamos a ver el if -->
    <?php
    if (3 > $c) {
        echo "<p>3 es mayor que " . $c . "</p>";
    } else if (3 == $c) {
        echo "<p>3 es igual que " . $c . "</p>";
    } else {
        echo "<p>3 es menor que " . $c . "</p>";
    }
    ?>
    <!-- vemos el switch -->
    <?php
    $d = 1;
    switch ($d) {
        case 1:
            $c = $a - $b;
            break;
        case 2:
            $c = $a / $b;
            break;
        case 3:
            $c = $a * $b;
            break;
        case 4:
            $c = $a + $b;
            break;
        default:
            $c = 10;
            break;
    }
    echo "<p>El resultado del swtich es " . $c . "</p>";
    ?>
    <!-- vamos a ver el for -->
    <?php
    for ($i = 0; $i <= 8; $i++) {
        echo "<p>Hola nº " . ($i + 1) . "</p>";
    }
    ?>
    <!-- vemos el while -->
    <?php
    $fin = 0;
    while ($fin <= 8) {
        echo "Hola v2 nº" . ($fin + 1) . "</p>";
        $fin++;
    }
    ?>

    <h2>Empezamos con los formularios.</h2>


</body>

</html>