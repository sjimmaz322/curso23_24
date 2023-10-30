<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1. Generador de "claves_cesar.txt"</title>
</head>

<body>
    <h1>Ejercicio 1. Generador de "claves_cesar.txt"</h1>
    <form action="ejercicio1.php" method="post" enctype="multipart/form-data">

        <input type="submit" name="btn" id="btn" value="Generar">
        <?php
        $contador = 1;
        $letra = 65;
        $linea0 = "Letra/Desplamiento;";
        $lineaBis = "";
        while ($contador <= 26) {
            if ($contador < 26) {
                $lineaBis .= $contador . ";";
            } else {
                $lineaBis .= $contador;
            }
            // echo "<span>" . $lineaBis . "</span><br/>";
            $contador++;
        }
        /*
        while ($contador < 26) {
            if ($contador < 25) {
                $lineaBis .= chr($letra + $contador) . ";";
            } else {
                $lineaBis .= chr($letra + $contador);
            }
            echo "<span>" . $lineaBis . "</span><br/>";
            $contador++;
        }
        */

        $linea0 = $linea0 . $lineaBis . PHP_EOL;
        if (isset($_POST["btn"])) {
            @$fd = fopen("src/claves_cesar.txt", "w+");
            if (!$fd) {
                die("El fichero no se ha creado correctamente");
            } else {
                fputs($fd, $linea0);
                //
                $contador = 0;
                $letra = 65;
                $line = "";
                for ($i = 0; $i <= 26; $i++) {

                    $letra = 65 + $i;


                    while ($contador <= 26) {
                        if ($contador < 26) {
                            if ($letra + $contador >= ord("Z")) {
                                $letra = 65 + $i;
                            }
                            $line .= chr($letra + $contador) . ";";
                        } else {
                            if ($letra + $contador >= ord("Z")) {
                                $letra = 65 + $i;
                            }
                            $line .= chr($letra);
                        }

                        $contador++;
                    }
                    $contador = 0;
                    fputs($fd, $line . PHP_EOL);
                    $line = "";
                }



                echo "<h2>Resultado</h2>";
                echo "<textarea id='txt' name='txt'>" . " " . "</textarea>";
                //
                fclose($fd);
            }
        }
        ?>
    </form>
</body>

</html>