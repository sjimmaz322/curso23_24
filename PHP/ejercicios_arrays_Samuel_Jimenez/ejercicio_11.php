<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 11</h2>";
    echo "<p>Rellena los 3 array del código, júntalos en uno y muéstralos por pantalla.</p>";
    //---***---
    $arr1 = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $arr2 = array("12", "34", "45", "52", "12");
    $arr3 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");
    //---
    $arr4 = array_merge($arr1, $arr2, $arr3);
    //---
    var_dump($arr4);
    ?>
</body>

</html>