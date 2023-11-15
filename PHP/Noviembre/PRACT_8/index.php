<?php
//Nombre img perfil -> img_[id_usuario].png sin corchetes
$conexion = mysqli_connect("localhost", "jose", "josefa", "bd_cv");
require("src/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 8</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black
        }

        table {
            border-collapse: collapse;
            text-align: center;
            margin: 0 auto;
            width: 100%;
        }

        th {
            background-color: #CCC
        }

        .normal {
            width: 50px;
        }

        .enlace {
            border: none;
            background: none;
            cursor: pointer;
            color: blue;
            text-decoration: underline
        }

        .error {
            color: red
        }

        .profile {
            max-width: 258px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>Práctica 8</h1>
    <?php
    if (isset($_POST["btnDetalle"])) {
        require("vistas/vista_detalle.php");
    }
    if (isset($_POST["btnCrear"]) || isset($_POST["btnGuardar"])) {
        require("vistas/vista_nuevoUsuario.php");
    }
    //
    require("vistas/vista_tabla.php");
    //
    ?>
</body>

</html>