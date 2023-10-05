<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recogida de datos</title>
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
    <h1>Aquí recogemos los datos</h1>
    <!-- Meto código php en el html -->
    <?php
    echo "<p><strong>Nombre: </strong>" . $_POST["nombre"] . "</p>";
    echo "<p><strong>Usuario: </strong>" . $_POST["user"] . "</p>";
    echo "<p><strong>Contraseña: </strong>" . $_POST["con"] . "</p>";

    echo "<p><strong>Sexo: </strong>" . $_POST["sex"] . "</p>";

    if (isset($_POST["suscripcion"])) {
        echo "<p><strong>Subscripción: </strong>" . $_POST["suscripcion"] . "</p>";
    } else {
        echo "<p><strong>Subscripción: </strong>" . "off" . "</p>";
    }

    echo "<h3>Datos de la imagen subida: </h3>";
    //Para darle nombre numérico único
    $nombre_nuevo = md5(uniqid(uniqid(), true));
    //Añadiendo la extensión que tiene
    $array_nombre = explode(".", $_FILES["foto"]["name"]);
    $ext = "";
    if (count($array_nombre) > 1) {
        $ext = "." . end($array_nombre);
    }
    $nombre_nuevo .= $ext;
    //Movemos a la carpeta de imágenes
    @$var = move_uploaded_file($_FILES["foto"]["tmp_name"], "img/" . $nombre_nuevo);
    if ($var) {

        echo "<p>";
        echo "<table>";

        foreach ($_FILES["foto"] as $key => $value) {
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
    <!-- Cierro el php y termino el html -->
</body>

</html>