<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría de arrays</title>
</head>

<body>

    <?php
    //Hacen lo mismo
    /*
    $nota[0] = 5;
    $nota[1] = 9;
    $nota[2] = 8;
    $nota[3] = 5;
    $nota[4] = 6;
    $nota[5] = 7;
    */
    /*
    $nota[] = 5;
    $nota[] = 9;
    $nota[] = 8;
    $nota[] = 5;
    $nota[] = 6;
    $nota[] = 7;
    */
    /*
    $nota = array(0=>5,1=> 9,2=> 8,3=> 5,4=> 6,5=> 7);
    */

    $nota = array(5, 9, 8, 5, 6, 7);

    echo "<h1>Recorrido de un array escalar con sus indices correlativos y en orden </h1>";

    for ($i = 0; $i < count($nota); $i++) {
        echo "<p>En la posición: " . $i . " está el valor: " . $nota[$i] . "</p>";
    }
    /*
    //print_r es solo para arrays
    print_r($nota);

    echo "<br/>";
    //Hace como print_r pero con cualquier variable
    var_dump($nota);
*/
    //---
    /*$valor[0] = 18;
    $valor[1] = "Hola";
    $valor[2] = true;
    $valor[3] = 3.4;
    */
    $valor[] = 18;
    $valor[99] = "Hola";
    $valor[] = true;
    $valor[200] = 3.4;
    //
    $valor = array(18, 99 => "hola", true, 200 => 3.4);
    //
    //echo "<br/>";
    //var_dump($valor);
    echo "<h1>Recorrido de un array escalar con sus indices NO correlativos.</h1>";
    foreach ($valor as $indice => $contenido) { //array as indice => valor
        echo "<p>En la posición: " . $indice . " está el valor: " . $contenido . "</p>";
    }

    //<h1>Notas de los Alumnos</h1>
    //Antonio:
    //    · DWESE -> 5
    //    · DWEC -> 7

    $notas["Antonio"]["DWESE"] = 5;
    $notas["Antonio"]["DWEC"] = 7;
    $notas["Luis"]["DWESE"] = 9;
    $notas["Luis"]["DWEC"] = 7;
    $notas["Ana"]["DWESE"] = 8;
    $notas["Ana"]["DWEC"] = 9;
    $notas["Eloy"]["DWESE"] = 5;
    $notas["Eloy"]["DWEC"] = 5;
    /*
    echo "<h1>Notas de los Alumnos</h1>";
    foreach ($notas as $nombre => $asignatura) {
        echo "<p><strong>" . $nombre . ". </strong>";
        echo "<ul>";
        foreach ($asignatura as $clase => $cal) {
            echo  "<li>" . $clase . " -> " . $cal . "</li>";
        }
        echo "</ul></p>";
    }
    */
    echo "<br/>";
    echo "<h1>Funciones con arrays</h1>";
    //Funciones predefinidas de arrays
    $capital = array("Castilla y León" => "Valladolid", "Asturias" => "Oviedo", "Aragón" => "Zaragoza");
    echo "<p>Último valor de un array: " . current($capital) . "</p>"; //Da el valor en el que estoy
    echo "<p>Último valor de un array: " . end($capital) . "</p>"; //Da el último valor
    echo "<p>Último valor de un array: " . current($capital) . "</p>"; //Da el valor en el que estoy
    echo "<p>Último valor de un array: " . key($capital) . "</p>"; //Da el índice en el que estoy
    echo "<p>Último valor de un array: " . reset($capital) . "</p>"; //Da el primer valor
    echo "<p>Último valor de un array: " . next($capital) . "</p>"; //Da el valor del indice+1
    echo "<p>Último valor de un array: " . prev($capital) . "</p>"; //Da el valor del indice-1
    //Se puede hacer pero ñeh
    while (current($capital)) {
        echo "<strong>" . current($capital) . "</strong></br>";
        next($capital);
    }
    ?>
</body>

</html>