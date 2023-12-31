<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria subir Fichero</title>
    <style>
        td,
        th,
        tr,
        table {
            border: 1px solid black;
            border-collapse: collapse;
            margin-left: 25px;
            padding: 5px;
        }

        .tam_imagen {
            height: 40%;
        }
    </style>
</head>

<body>
    <h1>Teoría subir ficheros al servidor.</h1>
    <h2>Información de la imagen enviada.</h2>
    <?php
    //Para darle nombre numérico único
    $nombre_nuevo = md5(uniqid(uniqid(), true));
    //Añadiendo la extensión que tiene
    $array_nombre = explode(".", $_FILES["archivo"]["name"]);
    $ext = "";
    if (count($array_nombre) > 1) {
        $ext = "." . end($array_nombre);
    }
    $nombre_nuevo .= $ext;
    //Movemos a la carpeta de imágenes
    @$var = move_uploaded_file($_FILES["archivo"]["tmp_name"], "img/" . $nombre_nuevo);
    if ($var) {

        echo "<p>";
        echo "<table>";

        foreach ($_FILES["archivo"] as $key => $value) {
            echo "<tr>";
            echo "<th>" . $key . "</th>";
            echo "<td>" . $value . "</td>";
            echo "</tr>";
        }


        echo "</table>";
        echo "</p>";
 
        echo "<h3>La imagen subida es:</h3>";
        echo "<p><img class='tam_image' src='img/" . $nombre_nuevo . "' alt='Foto' title='Foto' /></p>";
    } else {
        echo "<p> * No se ha podido subir mover la imagen a la carpeta destino en el servidor. * </p>";
    }
    ?>
</body>

</html>