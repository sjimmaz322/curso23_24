<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17</title>
</head>

<body>
    <?php
    echo "<h2>Ejercicio 17</h2>";
    echo "<p>Crea un array multidimensional para poder guardar los componentes de dos familias:<br/>
    'Los Simpsons' y 'los Griffin' dentro de cada familia ha de constar el padre, la madre y los hijos,
    donde padre, madre e hijos serán los índices y los nombres serán los valores.<br/>
    Muestra los valores en una lista no numerada.</p>";
    //---***---
    $familias = array(
        "Los Simpsons" => array(
            "Padre" => "Homer", "Madre" => "Marge",
            "Hijos" => array("Hijo1" => "Bart", "Hijo2" => "Lisa", "Hijo3" => "Maggie")
        ),
        "Los Griffin" => array(
            "Padre" => "Peter", "Madre" => "Lois",
            "Hijos" => array("Hijo1" => "Chris", "Hijo2" => "Meg", "Hijo3" => "Stewie")
        )
    );


    //var_dump($familias);


    echo "<ul>"; //Abro  ul1
    foreach ($familias as $apellido => $subarray) {
        echo "<li><strong>" . $apellido . "</strong>"; //abro li 1
        echo "<ul>"; //Abro  ul 2
        foreach ($subarray as $index => $name) {
            if (!is_array($name)) {
                echo "<li>" . $index . ": " . $name; //abro li 2
            } else {

                echo "<li>" . $index; // abro li 2
                echo "<ul>"; //Abro ul 3
                foreach ($name as $pos => $nombre) {
                    echo "<li>" . $pos . ": " . $nombre . "</li>";
                }

                echo "</ul>"; //Cierro ul 3

                echo "</li>"; //cierro li2
            }
        }
        echo "</ul>"; //Cierro ul 2       
        echo "</li>"; //cierro li 1
    }
    echo "</ul>"; //Cierro ul 1



    ?>
</body>

</html>