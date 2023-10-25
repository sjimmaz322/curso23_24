<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 22-23</title>
</head>

<body>
    <h2>Ejercicio 1</h2>
    <?php
    /*
    Se propone la realización de una página  php  con nombre ejercicio1.php  que contenga un botón que al pulsarse generase un  
    fichero con nombre claves_polybios.txt en el servidor y mostrase en un textarea el contenido de este fichero. 
    El contenido del fichero generado debe ser como el archivo adjunto.
    La generación de este fichero debe de hacerse mediante bucles y sentencias ( No “a mano”) 
    a excepción de la primera línea del fichero. 
    */
    ?>
    <form action="ejercicio1.php" method="post" enctype="multipart/form-data">
        <button type="submit" id="btn" name="btn">Generar</button>
    </form>
    <?php
    if (isset($_POST["btn"])) {
        $fd = fopen("claves_polybios2.txt", "w");
        $linea0 = "i/j;1;2;3;4;5" . PHP_EOL;
        //$letras = [["A", "B", "C", "D", "E"], ["F", "G", "H", "I", "K"], ["L", "M", "N", "O", "P"], ["Q", "R", "S", "T", "U"], ["V", "W", "X", "Y", "Z"]];
        $letras = [];
        for ($i = 0; $i < 25; $i++) {
            array_push($letras, chr(65 + $i));
            //echo "<p>" . $letras[$i] . "</p>";
        }

        fputs($fd, $linea0);
        $linea = "";
        $contador = 1;
        for ($i = 0; $i < count($letras); $i++) {
            if ($i % 4 == 0) {
                $linea = $linea . $letras[$i] . PHP_EOL;
                fputs($fd, $linea);
                $linea = "";
            } else {
                $linea = $linea . $letras[$i] . ";";
            }
        }

        echo "<textarea id='area' name='area'>" . $linea0 . "</textarea>";
    }
    ?>
</body>

</html>