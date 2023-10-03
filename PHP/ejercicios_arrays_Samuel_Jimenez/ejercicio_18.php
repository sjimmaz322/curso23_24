<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 18</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 18</h2>";
    echo "<p>Crea un array llamado deportes e introduce los siguientes valores: fútbol baloncesto, natación y tenis.<br/>
    Haz el recorrido de la matriz con un for para mostrar sus valores.A continuación realiza las siguientes operaciones:
        <ul>
        <li>Muestra el total de valores que contiene.</li>
        <li>Situa el puntero en el primer elementos del array y muestra el valor actual.</li>
        <li>Avanza una posición y muestra el valor actual.</li>
        <li>Coloca el puntero en la última posición y muestra su valor.</li>
        <li>Retrocede una posición y muestra ese valor.</li>
        </ul>
    </p>";
    //---***---
    $deportes = array("Fútbol", "Baloncesto", "Natación", "Tenis");
    //---
    for ($i = 0; $i < count($deportes); $i++) {
        echo "<p>El valor del índice " . $i . " es " . $deportes[$i] . "</p>";
    }
    //---
    echo "<p>El array contiene " . count($deportes) . " elmentos.</p>";
    echo "<p>El primer valor es " . current($deportes) . "</p>";
    echo "<p>El segundo valor es " . next($deportes) . "</p>";
    echo "<p>El último valor es " . end($deportes) . "</p>";
    echo "<p>El penúltimo valor es " . prev($deportes) . "</p>";
    ?>
</body>

</html>