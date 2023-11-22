<?php
if (isset($_POST["borrarDef"])) {

    try {
        $consulta = "select * from peliculas where idPelicula=" . $_SESSION["id"];
        $datos = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
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
