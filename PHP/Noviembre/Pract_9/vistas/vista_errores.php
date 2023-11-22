<?php
//Errores de agregar película
if (isset($_POST["btnAgregar"])) {
    $error_nombre = $_POST["nombrePeli"] == "" || strlen($_POST["nombrePeli"]) > 30;
    $error_director = $_POST["directorPeli"] == "" || strlen($_POST["directorPeli"]) > 20;
    $error_trama = $_POST["trama"] == "";
    $error_tema = $_POST["tema"] == "" || strlen($_POST["tema"]) > 15;
    //
    $formato = $_FILES["pic"]["type"];
    $formatos_validos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
    //
    $error_caratula = $_FILES["pic"]["error"] || $_FILES["pic"]["size"] > 1024 * 1024 || !in_array($formato, $formatos_validos);
    //
    if ($_FILES["pic"]["name"] != "") {
        $error_agregar = $error_nombre || $error_director || $error_trama || $error_tema || $error_caratula;
    }else{
        $error_agregar = $error_nombre || $error_director || $error_trama || $error_tema;
    }
}

