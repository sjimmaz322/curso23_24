<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría subir fichero al server</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Teoría subir ficheros al servidor.</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="archivo">Seleccione la imagen: (max: 500KB)</label>&nbsp;
            <input type="file" name="archivo" id="archivo" accept="image/*" />&nbsp;
            <?php
            if (isset($_POST["btnEnviar"]) && $error_archivo) {
                if ($_FILES["archivo"]["name"] != "") {

                    if ($_FILES["archivo"]["error"]) {
                        echo "<span class='error'> * No se ha podido subir el archivo al servidor *</span>";
                    } else if (!getimagesize($_FILES["archivo"]["tmp_name"])) {
                        echo "<span class='error'> * El archivo seleccionado no es una imagen *</span>";
                    } else {
                        echo "<span class='error'> * El archivo es demasiado grande *</span>";
                    }
                }
            }
            ?>
            <br />
            <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar" />
        </p>
    </form>
</body>

</html>