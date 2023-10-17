<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría Ficheros</title>
</head>

<body>
    <h1>Teoría de Ficheros TXT</h1>
    <?php
    //r - lectura, w - escritura, a - append
    // fopen("ruta","modo");
    //$fd1 es un puntero hacia el fichero
    //El + le da más funcionalidades peeeeeero
    @$fd1 = fopen("prueba.txt", "r+");
    if (!$fd1)
        die("<span>No se ha podido abrir el fichero</span");
    /*
    echo "<span>Por ahora todo en orden</span>";
    //fgets tiene un puntero interno, cada vez que lo pones salta al siguiente, si se sale, no peta!
    $linea = fgets($fd1);

    echo "<p>" . $linea . "</p>";

    $linea = fgets($fd1);

    echo "<p>" . $linea . "</p>";

    $linea = fgets($fd1);

    echo "<p>" . $linea . "</p>";

    $linea = fgets($fd1);

    echo "<p>" . $linea . "</p>";
    echo "<br/><p>Ahora lo hacemos con bucle</p><br/>";
    //lo manda a la posición 0
    fseek($fd1, 0);
    //como recorrer el fichero entero linea por linea.
    while ($linea = fgets($fd1)) {
        echo "<p>" . $linea . "</p>";
    }
*/
    //Vamos a escribir ahora

    //fputs(); o fwrite();
    //Constante para fin de linea PHP_EOL (End Of Line)

    //fwrite($fd1, PHP_EOL . "Añadimos una quinta línea");
    //Cuidado, cada vez que recargues se repite y añade otra

    //todos los fichero se puede leer así, pero entero, no de uno a uno
    $todo_fichero = file_get_contents("prueba.txt");
    //new line 2 br pone saltos de linea donde se cambie de renglón en el archivo original
    echo nl2br($todo_fichero);

    fclose($fd1);
    ?>
</body>

</html>