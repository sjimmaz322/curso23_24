<?php
session_start();
require("src/funciones.php");
require("vistas/vista_errores.php");
?>
<!DOCTYPE html>
<html lang="en">

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
    require("vistas/vista_listado.php");
    //
    if (isset($_SESSION["mensaje"])) {
        echo "<span class='mensaje'>" . $_SESSION["mensaje"] . "</span>";
    }
    if (isset($_POST["btnDetalle"])) {
        require("vistas/vista_detalle.php");
    }
    if (isset($_POST["btnCrear"]) || isset($_POST["btnAgregar"])) {
        require("vistas/vista_nuevaPeli.php");
    }
    //
    ?>
</body>

</html>