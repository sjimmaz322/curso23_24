<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de pŕactica</title>
    <style>
        .center {
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto;
            background-color: azure;
        }

        .recreo {
            text-align: center;
            font-weight: bold;
        }
    </style>
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
        function myLength($palabra)
        {
            $cont = 0;
            while (isset($palabra[$cont])) {
                $cont++;
            }
            return $cont;
        }
        function explodeMA($texto, $sepa)
        {
            $aux = [];
            $longitud = myLength($texto);
            $i = 0;

            while ($i < $longitud && $texto[$i] != $sepa)
                $i++;

            if ($i < $longitud) {
                $j = 0;
                $aux[$j] = $texto[$i];
                for ($i = $i + 1; $i < $longitud; $i++) {
                    if ($texto[$i] != $sepa) {
                        $aux[$j] .= $texto[$i];
                    } else {
                        while ($i < $longitud && $texto[$i] == $sepa)
                            $i++;

                        if ($i < $longitud) {
                            $j++;
                            $aux[$j] = $texto[$i];
                        }
                    }
                }
            }
            return $aux;
        }
        /*
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
        */
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
            <select name="sep" id="sep">
                <option value="," <?php if (isset($_POST["sep"]) && $_POST["sep"] == ",") echo "selected" ?>>,</option>
                <option value=";" <?php if (isset($_POST["sep"]) && $_POST["sep"] == ";") echo "selected" ?>>;</option>
                <option value=" " <?php if (isset($_POST["sep"]) && $_POST["sep"] == " ") echo "selected" ?>>(espacio)</option>
                <option value=":" <?php if (isset($_POST["sep"]) && $_POST["sep"] == ":") echo "selected" ?>>:</option>
            </select>
            <input type="submit" name="btn3" id="btn3" value="Comprobar">
        </form>
        <?php
        if (isset($_POST["btn3"]) && !$error_txt2) {
            $palabrejas = explodeMA($_POST["txt2"], $_POST["sep"]);
            echo "<span> Hay " . count($palabrejas) . " palabras</span>";
        }
        ?>

    </div>
    <div>
        <h2>Ejercicio 4</h2>
        <p>Realizar una página php con nombre ejercicio4.php, que al cargar
            compruebe si en una carpeta con nombre Horario, existe el archivo
            “horarios.txt”.</p>
        <?php
        if (isset($_POST["btn4"])) {
            $error_nombre2 = $_FILES["file2"]["name"] == "";
            $error_tam2 = $_FILES["file2"]["size"] > 1000 * 1024;
            $error_formato2 = $_FILES["file2"]["type"] != "text/plain";
            $error_error2 = $_FILES["file2"]["error"];
            //
            $error_fichero2 = $error_nombre2 || $error_tam2 || $error_formato2 || $error_error2;

            if (isset($_POST["btn4"]) && !$error_fichero2) {
                @$var = move_uploaded_file($_FILES["file2"]["tmp_name"], "Horarios/horarios.txt");

                if (!$var) {
                    echo "<h3>No se ha podido crear el fichero en la carpeta destino.</h3>";
                } else {
                    echo "<span>Archivo creado con éxito</span>";
                }
            }
        }

        @$fd = fopen("Horarios/horarios.txt", "r");
        if ($fd) {
            //Aquí se gestiona el fichero
        ?>
            <h2>Horario de los profesores</h2>
            <form action="examen1.php" method="post" enctype="multipart/form-data">
                <label for="profs">Profesor:</label>
                <select id="profs" name="profs">
                    <?php

                    while ($linea = fgets($fd)) {
                        $datos = explode("\t", $linea);
                        if (isset($_POST["btn5"]) && $_POST["profs"] == $datos[0]) {
                            echo "<option selected value='" . $datos[0] . "'> " . $datos[0] . "</option>";
                            $prof_selec = $datos[0];
                            for ($i = 1; $i < count($datos); $i += 3) {
                                $horario_profe[$datos[$i]][$datos[$i + 1]] = $datos[$i + 2];
                            }
                        } else {
                            echo   "<option value='" . $datos[0] . "'> " . $datos[0] . "</option>";
                        }
                    }
                    ?>
                </select>
                <button name="btn5" id="btn5" value="Comprobar">Ver horario</button>
            </form>
            <?php
            if (isset($_POST["btn5"])) {
                echo "<h3 class='center'> Datos del profesor: " . $prof_selec . "</h3>";
                //Aquí va la tabla
                $horas[1] = "8:15 - 9:15";
                $horas[] = "9:15 - 10:15";
                $horas[] = "10:15 - 11:15";
                $horas[] = "11:15 - 11:45";
                $horas[] = "11:45 - 12:45";
                $horas[] = "12:45 - 13:45";
                $horas[] = "13:45 - 14:45";

                echo "<table>";
            ?>
                <tr>
                    <th>-</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            <?php
                for ($hora = 1; $hora <= 7; $hora++) {
                    echo "<tr>";
                    echo "<th>" . $horas[$hora] . "</th>";
                    if ($hora != 4) {
                        for ($dia = 0; $dia < 5; $dia++) {
                            if (isset($horario_profe[$dia][$hora])) {
                                echo "<td>" . $horario_profe[$dia][$hora] . "</td>";
                            }
                            echo "<td></td>";
                        }
                    } else {
                        echo "<td class='recreo' colspan=5>RECREO</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>


        <?php
            fclose($fd);
        } else {
        ?>
            <form action="examen1.php" method="post" enctype="multipart/form-data">
                <label for="file2">Elija el fichero a subir (Max 1 MB)</label>
                <input type="file" accept=".txt" name="file2" id="file2">
                <?php
                if (isset($_POST["btn4"]) && $error_fichero2) {
                    if ($_FILES["file2"]["name"] == "") {
                        echo "<span> * No ha seleccionado ningún archivo * </span>";
                    } else if ($_FILES["file2"]["size"] > 1000 * 1024) {
                        echo "<span> * El archivo es demasiado grande * </span>";
                    } else if ($_FILES["file2"]["error"]) {
                        echo "<span> * Falló la carga del archivo * </span>";
                    } else {
                        echo "<span> * El archivo no es un archivo de texto * </span>";
                    }
                }

                ?>

                <input type="submit" id="btn4" name="btn4" value="Subir">

            </form>
        <?php
            echo "<h2>No se ha podido abrir el archivo: Horarios/horarios.txt</h2>";
        }
        ?>
    </div>
</body>

</html>