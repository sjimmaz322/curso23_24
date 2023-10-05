<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red
        }

        ;
    </style>
</head>

<body>
    <!-- <form action="index.php" method="get" enctype="multipart/form-data">-->
    <form action="index.php" method="post" enctype="multipart/form-data">
        <h2>Rellena tu CV</h2>

        <p>
            <label for="name">Nombre:</label></br>
            <input id="name" type=text name="nombre" value="<?php if (isset($_POST["nombre"])) echo $_POST['nombre']; ?>" />
            <?php
            if (isset($_POST["btnGuardar"]) && $error_nombre) {
                echo "<span class='error'>El campo nombre es obligatorio</span>";
            }
            ?>
        </p>
        <!---->
        <p>
            <label for="ape">Apellidos:</label></br>

            <input id="ape" type=text size=40 name="ape" value="<?php if (isset($_POST["ape"])) echo $_POST['ape']; ?>" />
            <?php
            if (isset($_POST["btnGuardar"]) && $error_ape) {
                echo "<span class='error'>El campo apellido es obligatorio</span>";
            }
            ?>
        </p>
        <!---->
        <p>
            <label for="con">Contraseña:</label></br>
            <input id="con" type=password name="con" />
            <?php
            if (isset($_POST["btnGuardar"]) && $error_con) {
                echo "<span class='error'>El campo contraseña es obligatorio</span>";
            }
            ?>
        </p>
        <!---->
        <p>
            <label for="dni">DNI:</label></br>
            <input id="dni" type=text name="dni" placeholder="DNI" value="<?php if (isset($_POST["dni"])) echo $_POST["dni"] ?>" />
            <?php
            if (isset($_POST["btnGuardar"]) && $error_dni) {

                if ($_POST["dni"] == "") {
                    echo "<span> * El campo DNI no puede estar vacío *</span>";
                } else if (!dni_bien_escrito(strtoupper($_POST["dni"]))) {
                    echo "<span>* El DNI no está bien escrito *</span>";
                } else {
                    echo "<span>* El DNI no es válido *</span>";
                }
            }
            ?>
        </p>
        <!---->
        <p>
        <p>Sexo <?php
                if (isset($_POST["btnGuardar"]) && $error_sexo) {
                    echo "<span class='error'>El sexo es obligatorio</span>";
                }
                ?></p>
        <input type=radio id=hombre name=sex value=Hombre <?php if (isset($_POST["sex"]) && $_POST["sex"] == "Hombre") echo "checked"; ?> />
        <label for="hombre">Hombre</label></br>
        <input type=radio id="mujer" name=sex value=Mujer <?php if (isset($_POST["sex"]) && $_POST["sex"] == "Mujer") echo "checked"; ?> />
        <label for="mujer">Mujer</label></br>
        </p>
        <!---->
        <p>
            <label for="foto">Incluir mi foto: </label>
            <input type="file" name="foto" id="foto" accept="image/*" />
            <!--
                Cuando se haya seleccionado y pasen !cositas
            -->
            <?php
            if (isset($_POST["btnGuardar"]) && $error_archivo) {
                if ($_FILES["foto"]["name"] != "") {
                    if (!getimagesize($_FILES["foto"]["tmp_name"])) {
                        echo "<span> * La foto seleccionado no es una imagen * </span>";
                    } else if ($_FILES["foto"]["error"]) {
                        echo "<span> * No se ha podido subir el foto al servidor * </span>";
                    } else {
                        echo "<span> * La foto es demasiado grande * </span>";
                    }
                }
            }
            ?>
        </p>
        <!---->
        <p>
            <label for="nacido">Nacido en: </label>
            <select name="nacido" id="nacido">
                <option value="Cordoba" <?php if (!isset($_POST["nacido"]) || (!isset($_POST["nacido"]) && $_POST["nacido"] == "Córdoba")) echo "selected";  ?>>Córdoba</option>
                <option value="Malaga" <?php if (!isset($_POST["nacido"]) || (!isset($_POST["nacido"]) && $_POST["nacido"] == "Málaga")) echo "selected";  ?>>Málaga</option>
                <option value="Granada" <?php if (!isset($_POST["nacido"]) || (!isset($_POST["nacido"]) && $_POST["nacido"] == "Granada")) echo "selected"; ?>>Granada</option>
            </select>
        </p>
        <!---->
        <p>
            <label for="comment">Comentarios:</label><textarea name="comment" id="comment" rows=7 cols=30></textarea>
            <?php
            if (isset($_POST["btnGuardar"]) && $error_comentario) {
                echo "<span class='error'>El campo comentario es obligatorio</span>";
            }
            ?>
        </p>
        <!---->
        <p><input type=checkbox name="suscripcion" id="suscripcion" checked><label for="suscripcion">Subscribirme al boletín de Novedades</label></p>
        <!---->
        <p><button type=submit name="btnGuardar" value="enviado">Guardar Cambios</button>
            &nbsp;
            <button type=submit name="btnBorrar" value="borrado">Borrar los datos introducidos</button>
        </p>
    </form>
</body>

</html>