<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de pŕactica</title>
</head>

<body>
    <h1>Examen de pŕactica.</h1>
    <div>
        <p>
            Realizar una página php con nombre ejercicio1.php, que contenga un
            formulario con un campo de texto y un botón. Este botón al pulsarse, nos
            va a modificar la página respondiendo cuántos caracteres se han
            introducido en el cuadro de texto
        <form action="examen1.php" method="post" enctype="multipart/form-data">
            <input type="texto1" name="texto1" id="texto1" value="<?php if (isset($_POST["texto1"])) echo $_POST["texto1"] ?>">
            <input type="submit" name="btn1" id="btn1" value="Contar">
        </form>
        </p>
        <?php
        if (isset($_POST["btn1"])) {
            $contador = 0;
            $palabra = $_POST["texto1"];
            while (isset($palabra[$contador])) {
                $contador++;
            }
            echo "<span>Hemos introducido " . $contador . " caracteres</span>";
        }

        ?>



    </div>

</body>

</html>