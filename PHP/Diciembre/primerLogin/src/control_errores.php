<?php
if (isset($_POST["agregar"])) {
    $error_nuevoName = $_POST["userName"] == "" || strlen($_POST["userName"]) > 50 || yaEstaba("usuarios", "usuario", $_POST["userName"]);
    $error_nuevaClave = $_POST["userPass"] == "" || strlen(($_POST["userPass"])) > 20;
    $error_nuevoCorreo = $_POST["userMail"] == "" || strlen($_POST["userMail"]) > 30 || yaEstaba("usuarios", "correo", $_POST["userMail"]);

    $error_agregar = $error_nuevoName || $error_nuevaClave || $error_nuevoCorreo;
}
