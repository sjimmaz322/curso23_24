<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 12</h2>";
    echo "<p>Realiza el ejercicio anterior pero usando array_push().</p>";
    //---***---
    $arr5 = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $arr6 = array("12", "34", "45", "52", "12");
    $arr7 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");
    //---
    $arr8 = array();
    //---
    foreach ($arr5 as $index => $valor) {
        array_push($arr8, $valor);
    }
    //---
    foreach ($arr6 as $index => $valor) {
        array_push($arr8, $valor);
    }
    //---
    foreach ($arr7 as $index => $valor) {
        array_push($arr8, $valor);
    }
    //---
    var_dump($arr8);
    ?>
</body>

</html>