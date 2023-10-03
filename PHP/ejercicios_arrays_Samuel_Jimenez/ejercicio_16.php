<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 16</h2>";
    echo "<p>Crea un array con los valores dados. Muestra el contenido.
        Cuenta el número de elementos que tiene y muéstralo por pantalla.
        A continuación borra el elemento en la posición 5.Vuelve a mostrar el contenido y último elimina el array.</p>";
    //---***---
    $valores = array(5 => 1, 12 => 2, 13 => 56, "x" => 42);
    var_dump($valores);
    echo "<p>El array tiene " . count($valores) . " elementos.</p>";
    unset($valores[5]);
    unset($valores);
    //echo "<p>El array tiene ".count($valores)." elementos.</p>"; Da fallo porque $valores ya no existe.
    ?>
</body>

</html>