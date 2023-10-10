<?php

if (isset($_POST["btnEnviar"])) {
    $error_vacio = $_POST["fec1"] = "" || $_POST["fec2"] = "";
    $error_longi = strlen($_POST["fec1"]) != 10 || strlen($_POST["fec2"]) != 10;
    $error_formato = substr($_POST["fec1"], 2, 1) != "/" || substr($_POST["fec2"], 2, 1) != "/" || substr($_POST["fec1"], 5, 1) != "/" || substr($_POST["fec2"], 5, 1) != "/";
    $error_num1 = substr($_POST["fec1"], 0, 2) < 00 || substr($_POST["fec1"], 0, 2) > 31 || substr($_POST["fec2"], 0, 2) < 00 || substr($_POST["fec2"], 0, 2) > 31;
    $error_num2 = substr($_POST["fec1"], 3, 2) < 00 || substr($_POST["fec1"], 3, 2) > 12 || substr($_POST["fec2"], 3, 2) < 00 || substr($_POST["fec2"], 3, 2) > 12;
    $error_num3 = substr($_POST["fec1"], 5, 4) < 1970 || substr($_POST["fec1"], 5, 4) > 9999 || substr($_POST["fec2"], 5, 4) < 1970 || substr($_POST["fec2"], 5, 4) > 9999;
    $error_num = $error_num1 || $error_num2 || $error_num3;
    $error_fecha = checkdate((substr($_POST["fec1"], 0, 2)), (substr($_POST["fec1"], 3, 2)), (substr($_POST["fec1"], 5, 4))) || checkdate((substr($_POST["fec2"], 0, 2)), (substr($_POST["fec2"], 3, 2)), (substr($_POST["fec2"], 5, 4)));

    $error_form = $error_vacio || $error_longi || $error_formato || $error_num || $error_fecha;
}

if (isset($_POST["btnEnviar"]) && !$error_form) {
    require "vistas/vistaRespuesta.php";
} else {
    require "vistas/vistaFormulario.php";
}
