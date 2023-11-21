<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>

<body>
    <?php
    //---***---
    $arr5 = array("Lagartija", "Araña", "Perro", "Gato", "Ratón");
    $arr6 = array("12", "34", "45", "52", "12");
    $arr7 = array("Sauce", "Pino", "Naranjo", "Chopo", "Perro", "34");
    //---
    $arr8 = array();

    foreach ($arr5 as $index => $valor) {
        array_push($arr8, $valor);
    }
    foreach ($arr6 as $index => $valor) {
        array_push($arr8, $valor);
    }
    foreach ($arr7 as $index => $valor) {
        array_push($arr8, $valor);
    }
    //var_dump($arr8);
    //---***---
    echo "<h2>Ejercicio 13</h2>";
    echo "<p>Muestra el array del ejercicio anterior pero en orden inverso.</p>";
    //---***---
    var_dump(array_reverse($arr8));
    ?>
</body>

</html>