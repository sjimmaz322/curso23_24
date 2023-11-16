<?php
function yaEstaba($tabla, $columna, $dato)
{
    $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_cv");
    $consulta = "SELECT * FROM $tabla WHERE $columna = '$dato'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
        return true;
    } else {
        return false;
    }
}
function sacarLetraNIF($dni)
{
    $valor = (int) ($dni / 23);
    $valor *= 23;
    $valor = $dni - $valor;
    $letras = "TRWAGMYFPDXBNJZSQVHLCKEO";
    $letraNif = substr($letras, $valor, 1);
    return $letraNif;
}
function letraCorrectaDni($dni)
{
    return sacarLetraNIF(substr($dni, 0, 8)) != substr($dni, -1);
}
