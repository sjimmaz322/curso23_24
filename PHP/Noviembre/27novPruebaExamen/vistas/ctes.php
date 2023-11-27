<?php
function errorPage($error)
{
    return "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>ERROR</title>
</head>
<body>
    <h1>No se ha podido conectar a la BBDD debido al error:</h1>
    <h2>" . $error . "</h2>
</body>
</html>";
};
//
try {
    $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_exam_colegio");
} catch (Exception $e) {
    mysqli_close($conexion);
    die(errorPage($e));
};
//
