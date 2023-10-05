<?php
if (isset($_POST["btnEnviar"])) {
    $error_archivo = ($_FILES["archivo"]["name"] == ""
        || !getimagesize($_FILES["archivo"]["tmp_name"])
        || $_FILES["archivo"]["error"])
        || ($_FILES["archivo"]["size"]) > 500 * 1024;
}
if (isset($_POST["btnEnviar"]) && !$error_archivo) {
    require "vistas/vistaRespuesta.php";
} else {
    require "vistas/vistaFormulario.php";
}
