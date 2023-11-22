<?php
session_start();
require("src/funciones.php");
require("vistas/vista_errores.php");
require("vistas/vista_confirmacion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIDEOCLUB</title>
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <h1>Video Club</h1>
    <?php
    //
    if (isset($_SESSION["mensaje"])) {
        echo "<p>";
        echo "<span class='mensaje'>";
        echo  $_SESSION["mensaje"];
        echo "</span>";
        echo "</p>";
        session_destroy();
    }
    //
    require("vistas/vista_listado.php");
    //
    if (isset($_POST["btnDetalle"])) {
        require("vistas/vista_detalle.php");
    }
    //
    if (isset($_POST["btnCrear"]) || isset($_POST["btnAgregar"])) {
        require("vistas/vista_nuevaPeli.php");
    }
    //
    if (isset($_POST["borrarPeli"])) {
        require("vistas/vista_borrado.php");
    }
    //
    ?>
</body>

</html>