<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios con Arrays</title>
</head>

<body>
    <?php
    echo "<h1>Primera relación de ejercicios</h1>";
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
    //---***---
    echo "<h2>Ejercicio 2</h2>";
    echo "<p>Imprime los valores de array asociativo siguiente usando la estructura de control foreach. (Está en el código)</p>";
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
    //---***---
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
    //---***---
    echo "<h2>Ejercicio 4</h2>";
    echo "<p>Crea un array e introduce los siguientes valores: Pedro, Ana, 34 y 1, respectivamente, sin asignar el indice de la matriz.
    Muestra el esquema del array con print_r()</p>";
    $array = array('Pedro', 'Ana', 34, 1);
    print_r($array);
    //---***---
    echo "<h2>Ejercicio 5</h2>";
    echo "<p>Crea un array asociativa para para introducir los datos de una persona. (Está en el código).</br>
    Al acabar muestra los datos por pantalla.</p>";
    //---***---
    $persona['Nombre'] = "Pedro Torres";
    $persona["Dirección"] = "C/ Mayor, 37";
    $persona["Teléfono"] = 123456789;

    print_r($persona);
    //---***---
    echo "<h2>Ejercicio 6</h2>";
    echo "<p>Crea un array asociativa para para introducir los datos de una persona. (Está en el código).</br>
     Al acabar muestra los datos por pantalla.</p>";
    //---***---
    ?>

</body>

</html>