<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
    //---***---
    echo "<h2>Ejercicio 5</h2>";
    echo "<p>Crea un array asociativa para para introducir los datos de una persona. (Está en el código).</br>
     Al acabar muestra los datos por pantalla.</p>";
    //---***---
    $persona['Nombre'] = "Pedro Torres";
    $persona["Dirección"] = "C/ Mayor, 37";
    $persona["Teléfono"] = 123456789;
    //---
    print_r($persona);
    ?>
</body>

</html>