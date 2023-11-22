<?php
session_start();
if (isset($_POST["btnBorrarSesion"])) {
    //session_destroy(); Borra los datos a la siguiente interacción
    session_unset(); //Esa misma vez ya está borrado todo
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibido</title>
</head>

<body>
    <h1>Teoría de sesiones: bis</h1>
    <h2>Se han recibido los siguientes datos</h2>
    <p>
        <?php
        if (isset($_SESSION["nombre"])) {
            echo "<strong>Nombre:</strong> - " . $_SESSION["nombre"];
            echo "</br>";
            echo "<strong>Contraseña:</strong> - " . $_SESSION["clave"];
        } else {
            echo "<strong>No hay nada, desfilando.</strong>";
        }
        ?>
    </p>
    <p><a href="index.php">Volver a index</a></p>
</body>

</html>