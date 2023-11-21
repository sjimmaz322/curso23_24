<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
    <style>
        table,td, tr, th{
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 9</h2>";
    echo "<p>Crea un array llamado 'lenguajes_cliente' y otra llamada 'lenguajes_servidor', crea tú mismo los valores,
    poniendo índices alfanuméricos a cada valor.
    Junta ambas arrays en una solo llamada lenguajes y muéstrala por pantalla en una tabla.</p>";
    //---***---
    $lenguajes_clientes = array("lc1" => "JavaScript", "lc2" => "Hypertext Preprocessor", "lc3" => "React");
    $lenguajes_servidor = array("ls1" => "Python", "ls2" => "NodeJS", "ls3" => "Ruby");
    //---
    $lenguajes = array_merge($lenguajes_clientes, $lenguajes_servidor);
    echo "<table>";
    echo "<tr><th colspan=2>Lenguajes</th></tr>";
    foreach ($lenguajes as $siglas => $lenguaje) {
        echo "<tr>";
        echo "<td><p>" . $siglas . "</p></td>";
        echo "<td><p>" . $lenguaje . "</p></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>

</html>