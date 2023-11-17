<?php
if (isset($_POST["btnGuardar"])) {
    $error_usuario = $_POST["nuevoUsuario"] == "" || strlen($_POST["nuevoUsuario"]) > 30 || yaEstaba("usuarios", "usuario", $_POST["nuevoUsuario"]);
    $error_clave = $_POST["nuevaContra"] == "" || strlen($_POST["nuevaContra"]) > 50;
    $error_nombre = $_POST["nuevoNombre"] == "" || strlen($_POST["nuevoNombre"]) > 50;
    $error_dni = $_POST["nuevoDni"] == "" || strlen($_POST["nuevoDni"]) != 10 || /*letraCorrectaDni($_POST["nuevoDni"]) ||*/ yaEstaba("usuarios", "dni", $_POST["nuevoDni"]);
    $error_sexo = !isset($_POST["sex"]);
    if ($_FILES["pic"]["name"] != "") {
        $error_foto = $_FILES["pic"]["size"] > 500 * 1240 || $_FILES["pic"]["error"] || $_FILES["pic"]["type"] != "image/png";
        $error_form = $error_usuario || $error_clave || $error_nombre || $error_dni || $error_sexo || $error_foto;
    } else {
        $error_form = $error_usuario || $error_clave || $error_nombre || $error_dni || $error_sexo;
    }
    //
    if (!$error_form) {
        //echo "<p>Funciona</p>";
        $consulta = "select * from usuarios";
        $resultado = mysqli_query($conexion, $consulta);
        $last_index = 0;
        while ($tupla = mysqli_fetch_array($resultado)) {
            $last_index = $tupla["id_usuario"];
        }
        $last_index += 1;
        if ($_FILES["pic"]["name"] == "") {
            $nombre_foto = "no_imagen.jpg";
        } else {
            $nombre_foto = "img_" . $last_index . ".png";
        }

        @$var = move_uploaded_file($_FILES["pic"]["tmp_name"], "img/" . "img_" . $last_index . ".png");
        $insersion = "INSERT INTO usuarios (usuario, clave, nombre, dni, sexo, foto) VALUES ('" . $_POST['nuevoUsuario'] . "', '" . $_POST['nuevaContra'] . "', '" . $_POST['nuevoNombre'] . "', '" . $_POST['nuevoDni'] . "', '" . $_POST['sex'] . "', '" . $nombre_foto . "')";

        $resultado = mysqli_query($conexion, $insersion);
        header("Location: index.php");
        mysqli_close($conexion);
        exit();
    }
}
//
if (isset($_POST["borrarDef"])) {
    $id_borrar = $_POST["borrarDef"];

    try {
        $consulta = "select * from usuarios where id_usuario=" . $id_borrar;
        $datos = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
    }
    //
    $array_datos = mysqli_fetch_assoc($datos);
    $nom_foto = $array_datos["foto"];
    $file_path = "img/" . $nom_foto;
    //  
    if ($nom_foto != "no_imagen.jpg") {
        unlink($file_path);
    }
    //
    $orden_borrado = "DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` =" . $id_borrar;
    $resultado = mysqli_query($conexion, $orden_borrado);
    //
    $reiniciar_autoincrement = "ALTER TABLE usuarios AUTO_INCREMENT = 1";
    $resultado_reset = mysqli_query($conexion, $reiniciar_autoincrement);
    //
    header("Location: index.php");
    mysqli_close($conexion);
    exit();
}
if (isset($_POST["btnEditar"])) {
    /*
    if ($datos_user["usuario"] != $_POST["cUsuario"]) {
        $error_user = strlen($_POST["cNombre"]) > 30 || yaEstaba("usuarios", "usuario", $_POST["cNombre"]);
    } else {
        $error_user = false;
    }
    if ($datos_user["dni"] != $_POST["cDni"]) {
        $error_nuevo_dni =   $_POST["cDni"] == "" || strlen($_POST["cDni"]) != 10 || /*letraCorrectaDni($_POST["nuevoDni"]) ||*//* yaEstaba("usuarios", "dni", $_POST["cDni"]);
    } else {
        $error_nuevo_dni = false;
    }
    if ($_FILES["cpic"]["name"] != "") {
        $error_pic = $_FILES["cpic"]["size"] > 500 * 1240 || $_FILES["cpic"]["error"] || $_FILES["cpic"]["type"] != "image/png";
    }
    $error_edicion = $error_user || $error_nuevo_dni || $error_pic;
    */
}
