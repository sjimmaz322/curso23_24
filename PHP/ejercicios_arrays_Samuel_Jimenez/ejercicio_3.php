<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 3</h2>";
    echo "<p>Realiza un programa que muestre las películas que has visto.
        Crea un array que contenga los meses de enero, febrero, marzo y abril, asignando los valores 9,12,0 y 17 respectivamemnte.
        Si en alguno de los meses no se ha visto ninguna película, no ha de mostrarse ese mes.</p>";
    //---***---
    $pelis['enero'] = 9;
    $pelis['febrero'] = 12;
    $pelis['marzo'] = 0;
    $pelis['abril'] = 17;
    //---
    echo "<p>";
    foreach ($pelis as $mes => $numPelis) {
        if ($numPelis != 0) {
            echo "<span>En " . $mes . " vi " . $numPelis . " películas.</span></br>";
        }
    }
    echo "</p>";
    ?>
</body>

</html>