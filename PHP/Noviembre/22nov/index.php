<?php
session_start();

?>
<!------>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones</title>
</head>

<body>
    <h1>Teoría de sesiones</h1>
    <?php
    $_SESSION["nombre"] = "Samuel Jiménez";
    $_SESSION["clave"] = md5("1234");
    ?>
    <p><a href="recibido.php">Ir a recibido</a></p>
</body>

</html>