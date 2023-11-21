<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14</title>
    <style>
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 14</h2>";
    echo "<p>Implementa un array asociativo, muestra el índice y el valor en una tabla.
    Elimina el asociado Real Madrid.
    Muestra los elementos en una lista numerada</p>";
    //---***---
    $estadios = array("Barcelona" => "Camp Nou", "Real Madrid" => "Santiago Bernabeu", "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta");
    //---
    echo "<table>";
    foreach ($estadios as $ciudad => $campo) {
        echo "<tr>";
        echo "<td><p>" . $ciudad . "</p></td>";
        echo "<td><p>" . $campo . "</p></td>";
        echo "</tr>";
    }
    echo "</table>";
    //---
    unset($estadios["Real Madrid"]);
    //---
    echo "<ol>";
    foreach ($estadios as $index => $campo) {
        echo "<li>El " . $index . " juega en el " . $campo . ".</li>";
    }
    echo "</ol>";
    ?>
</body>

</html>