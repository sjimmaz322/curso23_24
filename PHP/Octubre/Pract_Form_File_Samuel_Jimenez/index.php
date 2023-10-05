<?php
require "src/funciones.php";

$error_form = false;
if (isset($_POST["btnGuardar"])) { //Miro si hay errores
    $error_nombre = $_POST["nombre"] == "";
    $error_ape = $_POST["ape"] == "";
    $error_con = $_POST["con"] == "";
    $error_dni = $_POST["dni"] == "" || !dni_bien_escrito(strtoupper($_POST["dni"])) || !dni_valido(strtoupper($_POST["dni"]));
    $error_sexo = !isset($_POST["sex"]);
    $error_comentario = $_POST["comment"] == "";
    //Error de archivo

    $error_archivo = ($_FILES["foto"]["name"] == "" && $_FILES["foto"]["error"]) || !getimagesize($_FILES["foto"]["tmp_name"]) ||  ($_FILES["foto"]["size"]) > 500 * 1024;


    $error_form = $error_nombre || $error_ape || $error_dni || $error_con || $error_sexo || $error_comentario || $error_archivo;
}
if (isset($_POST["btnGuardar"]) && !$error_form) {
    require "vistasRespuestas.php";
} else {
    require "vistasFormulario.php";
}
