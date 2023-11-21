<?php
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
    if (isset($_POST["btnDetalle"])) {
        require("vistas/vista_detalle.php");
    }
    //
    ?>
</body>

</html>