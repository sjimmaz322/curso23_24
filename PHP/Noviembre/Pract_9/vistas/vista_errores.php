<?php
//Errores de agregar película
if (isset($_POST["btnAgregar"])) {
    $error_nombre = $_POST["nombrePeli"] == "" || strlen($_POST["nombrePeli"]) > 30;
    $error_director = $_POST["directorPeli"] == "" || strlen($_POST["directorPeli"]) > 20;
    $error_trama = $_POST["trama"] == "";
    $error_tema = $_POST["tema"] == "" || strlen($_POST["tema"]) > 15;
    //
    $error_agregar = $error_nombre || $error_director || $error_trama || $error_tema;
}
