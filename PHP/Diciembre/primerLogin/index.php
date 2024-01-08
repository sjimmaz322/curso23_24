<?php
require("src/func_ctes.php");
require("src/control_errores.php");
session_name("Primer_loggin_23_24");
session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer Loggin Hecho</title>
    <link href="index.css" rel="stylesheet">
</head>

<body>
    <h1>Primer Loggin Correcto</h1>
    <?php
    if (isset($_POST["btnSalir"])) {
        session_destroy();
        header("Location:index.php");
        exit;
    }
    if (isset($_SESSION["usuario"])) {
        require("src/seguridad.php");

        if ($datos["tipo"] == "admin") {
            require("vistas/vista_admin.php");
        } else {
            require("vistas/vista_normal.php");
        }
        mysqli_close($conection);
    } else {
        require("vistas/vista_loggin.php");
    }
    ?>
</body>

</html>