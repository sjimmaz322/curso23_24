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
        <h2>Ejercicio 1</h2>
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
    <div>
        <?php
        if (isset($_POST["btn2"])) {
            $error_nombre = $_FILES["file1"]["name"] == "";
            $error_tam = $_FILES["file1"]["size"] > 1000 * 1024;
            $error_formato = $_FILES["file1"]["type"] != "text/plain";
            $error_error = $_FILES["file1"]["error"];
            //
            $error_fichero1 = $error_nombre || $error_tam || $error_formato || $error_error;
        }
        ?>
        <h2>Ejercicio 2</h2>
        <p>Realizar una página php con nombre ejercicio2.php, que te permita subir
            un fichero txt no más grande de 1MB.
            Si el fichero es subido con éxito, será movido con el nombre de
            “archivo.txt” a una carpeta llamada “Ficheros”.
            Informar de los posibles errores y cuándo no los haya, del resultado de la
            operación ( Archivo subido o no con Éxito)</p>
        <form action="examen1.php" method="post" enctype="multipart/form-data">
            <label for="file1">Elija el fichero a subir (Max 1 MB)</label>
            <input type="file" accept=".txt" name="file1" id="file1">
            <?php
            if (isset($_POST["btn2"]) && $error_fichero1) {
                if ($_FILES["file1"]["name"] == "") {
                    echo "<span> * No ha seleccionado ningún archivo * </span>";
                } else if ($_FILES["file1"]["size"] > 1000 * 1024) {
                    echo "<span> * El archivo es demasiado grande * </span>";
                } else if ($_FILES["file1"]["error"]) {
                    echo "<span> * Falló la carga del archivo * </span>";
                } else {
                    echo "<span> * El archivo no es un archivo de texto * </span>";
                }
            }

            ?>

            <input type="submit" id="btn2" name="btn2" value="Subir">
            <?php
            if (isset($_POST["btn2"]) && !$error_fichero1) {
                $nombre_fichero = "archivo.txt";
                $ruta = "Ficheros/" . $nombre_fichero;
                @$var = move_uploaded_file($_FILES["file1"]["tmp_name"], $ruta);

                if (!$var) {
                    die("<span>No se ha podido crear el fichero " . $nombre_fichero . "</span>");
                } else {
                    echo "<span>Archivo creado con éxito</span>";
                }
            }
            ?>
        </form>
    </div>
    <div>

        <?php
        if (isset($_POST["btn3"])) {

            $error_txt2 = $_POST["txt2"] == "";
        }
        function myExplode($frase, $separador)
        {
            $arr = [];
            $contador = 0;
            //Mientras haya frase
            while (isset($frase[$contador])) {
                $arr2 = [];
                //Si el caracter mirado es distinto al separador
                if ($frase[$contador] != $separador) {
                    //Métemelo en un array dentro del array
                    array_push($arr2, $frase[$contador]);
                } else {
                    //Sino mete el array en el array
                    array_push($arr, $arr2);
                }
                //Mira el siguiente caracter
                $contador++;
            }
            //Devuélveme el array creado
            return $arr;
        }
        ?>
        <h2>Ejercicio 3</h2>
        <p>Realizar una página php con nombre ejercicio3.php, que contenga un
            formulario con un campo de texto, un select y un botón. Este botón al
            pulsarse, nos va a modificar la página respondiendo cuántas palabras hay
            en el cuadro de texto según el separador seleccionado en el select
            (“,”,”;”,”(espacio)“,”:”)
            Se hará un control de error cuando en el cuadro de texto no se haya
            introducido nada.</p>
        <form action="examen1.php" method="post" enctype="multipart/form-data">
            <input type="text" name="txt2" id="txt2" value="<?php if (isset($_POST["txt2"])) echo $_POST["txt2"] ?>">
            <?php
            if (isset($_POST["btn3"]) && $error_txt2) {
                if ($_POST["txt2"] == "") {
                    echo "<span>* No se puede dejar en blanco *</span>";
                }
            }
            ?>
            <select name="separadores" id="separadores">
                <option value="," <?php if ($_POST["separadores"] == ",") echo "selected" ?>>,</option>
                <option value=";" <?php if ($_POST["separadores"] == ";") echo "selected" ?>>;</option>
                <option value=" " <?php if ($_POST["separadores"] == " ") echo "selected" ?>>(espacio)</option>
                <option value=":" <?php if ($_POST["separadores"] == ":") echo "selected" ?>>:</option>
            </select>
            <input type="submit" name="btn3" id="btn3" value="Comprobar">
        </form>
        <?php
        if (isset($_POST["btn3"]) && !$error_txt2) {
            $palabrejas = myExplode($_POST["txt2"], $_POST["separadores"]);
            echo "<span> Hay " . count($palabrejas) . " palabras</span>";
        }
        ?>

    </div>
</body>

</html>