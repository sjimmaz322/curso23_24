<?php
//Hacemos la primera función
function en_array($valor, $array)
{
    $esta = false;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $valor) {
            $esta = true;
            break;
        }
    }

    return $esta;
}
//Compruebo errores
if (isset($_POST['btnEnviar'])) {
    $error_nombre = $_POST['nombre'] == "";
    $error_sexo = !isset($_POST['sexo']);

    $error_formulario = $error_nombre || $error_sexo;
}
//Decido vista según errores
if (isset($_POST['btnEnviar']) && !$error_formulario) {
    require "vistas/vistaRespuesta.php";
} else {
    require "vistas/vistaFormulario.php";
}
