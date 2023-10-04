<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 19</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 19</h2>";
    echo "<p>Crea una matriz para guardar a los amigos clasificados por diferentes ciudades. Los valores son los siguientes.<br/><br/>
   En Madrid: nombre Pedro, edad 32, teléfono 91-999.99.99.<br/>
   En Barcelona: nombre Susana, edad 34, teléfono 93-000.00.00.<br/>
   En Toledo: nombre Sonia, edad 42, teléfono 925-09.09.09.</br><br/>
   Haz un recorrido del array multidimensional mostrando los valores de tal manera que nos muestre en cada ciudad qué amigos tiene.
   </p>";
    //---***---
    $amigos = array(
        "Madrid" => array(
            array("Nombre" => "Pedro", "Edad" => 32, "Teléfono" => "91-999.99.99"),
            array("Nombre" => "Paco", "Edad" => 42, "Teléfono" => "91-777.99.99"),
            array("Nombre" => "J. Ignacio", "Edad" => 69, "Teléfono" => "91-777.22.33")
        ),
        "Barcelona" => array(
            array("Nombre" => "Susana", "Edad" => 34, "Teléfono" => "93-000.00.00"),
            array("Nombre" => "Carla", "Edad" => 20, "Teléfono" => "93-123.58.00")
        ),
        "Toledo" => array(
            array("Nombre" => "Sonia", "Edad" => 42, "Teléfono" => "925-09.09.09"),
            array("Nombre" => "Vicky", "Edad" => 28, "Teléfono" => "931-11.58.00"),
            array("Nombre" => "Samuel", "Edad" => 29, "Teléfono" => "923-77.88.99")
        )
    );

    echo "<dl>";
    foreach ($amigos as $ciudad => $subarray) {
        echo "<dt>Amigos en " . $ciudad . "</dt>";
        foreach ($subarray as $campo => $valor) {
            echo "<br/>";
            foreach ($valor as $campo => $datos) {
                echo "<dd>" . $campo . ":" . $datos . "</dd>";
            }
            echo "<br/>";
        }
    }
    echo "</dl>";
    ?>
</body>

</html>