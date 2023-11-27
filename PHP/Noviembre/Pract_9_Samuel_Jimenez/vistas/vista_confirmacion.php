<?php
if (isset($_POST["borrarDef"])) {

    try {
        $consulta = "select * from peliculas where idPelicula=" . $_SESSION["id"];
        $datos = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        session_destroy();
        mysqli_close($conexion);
        die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
    }
    //
    $array_datos = mysqli_fetch_assoc($datos);
    $nom_foto = $array_datos["caratula"];
    $file_path = "img/" . $nom_foto;
    //  
    if ($nom_foto != "no_img.jpg") {
        unlink($file_path);
    }
    //
    $orden_borrado = "DELETE FROM peliculas WHERE idPelicula =" . $_SESSION["id"];
    $resultado = mysqli_query($conexion, $orden_borrado);
    //
    $reiniciar_autoincrement = "ALTER TABLE peliculas AUTO_INCREMENT = 1";
    $resultado_reset = mysqli_query($conexion, $reiniciar_autoincrement);
    //
    $_SESSION["mensaje"] = "Película borrada satisfactoriamente de la base de datos";
    header("Location: index.php");
    mysqli_close($conexion);
    exit();
}
if (isset($_POST["confBorrar"])) {
    try {
        $consulta = "select * from peliculas where idPelicula=" . $_SESSION["id"];
        $datos = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        session_destroy();
        mysqli_close($conexion);
        die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
    }
    $array_datos = mysqli_fetch_assoc($datos);
    $nom_foto = $array_datos["caratula"];
    $file_path = "img/" . $nom_foto;
    //  
    if ($nom_foto != "no_img.jpg") {
        unlink($file_path);
    }
    //
    $cambiar_caratula = "UPDATE peliculas SET caratula = 'no_img.jpg' WHERE idPelicula = " . $_SESSION["id"] . "; ";
    $resultado = mysqli_query($conexion, $cambiar_caratula);
    $_SESSION["mensaje"] = "La carátula de la película " . $array_datos["titulo"] . " se cambió por la predeterminada.";
    header("Location: index.php");
    mysqli_close($conexion);
    exit();
}
if (isset($_POST["edit"])) {
    $newName = $_POST["title"];
    $newDire = $_POST["dire"];
    $newGenero = $_POST["genero"];
    $newSinopsis = $_POST["sinop"];
    //
    if ($_FILES["pic2"]["name"] != "") {
        unlink("img/img_" . $_SESSION["id"] . ".png");
        $nombre_foto = ($_FILES["pic2"]["name"] == "") ? "no_img.jpg" : "img_" . $_SESSION["id"] . ".png";
        move_uploaded_file($_FILES["pic2"]["tmp_name"], "img/" . $nombre_foto);
    }
    //
    $orden_editado = "UPDATE peliculas SET titulo='" . $newName . "',director='" . $newDire . "',sinopsis='" . $newSinopsis . "',tematica='" . $newGenero . "',caratula='" . "img_" . $_SESSION["id"] . ".png" . "' WHERE idPelicula=" . $_SESSION['id'];
    $resultado = mysqli_query($conexion, $orden_editado);
    //
    $_SESSION["mensaje"] = "Película editada satisfactoriamente de la base de datos";
    header("Location: index.php");
    mysqli_close($conexion);
    exit();
}
