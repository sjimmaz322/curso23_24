<?php
if (isset($_POST["btnBorrar"])) {

    unset($_POST);
    //Otra forma menos correcta
    //header("Locarion:index.php) 
    //exit;
}

$error_form = false;
if (isset($_POST["btnGuardar"])) { //Miro si hay errores
    $error_nombre = $_POST["nombre"] == "";
    $error_ape = $_POST["ape"] == "";
    $error_con = $_POST["con"] == "";
    $error_dni = $_POST["dni"] == "";
    $error_sexo = !isset($_POST["sex"]);
    $error_comentario = $_POST["comment"] == "";
    $error_form = $error_nombre || $error_ape || $error_dni || $error_con || $error_sexo || $error_comentario;
}
if (isset($_POST["btnGuardar"]) && !$error_form) {
    require "vistas/vistasRespuestas.php";
} else {
    require "vistas/vistasFormulario.php";
}
