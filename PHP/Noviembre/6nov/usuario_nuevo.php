<?php

function error_page($title, $body)
{
    $page = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $title . '</title>
    </head>
    <body>
        ' . $body . '
    </body>
    </html>';
    return $page;
}

function repetido($conexion, $tabla, $columna, $valor)
{
    try {
        $consulta =  "Select * from " . $tabla . " where " . $columna . " = " . $valor . "";
        $resultado = mysqli_query($conexion, $consulta);
        $respuesta = mysqli_num_rows($resultado) > 0;
        mysqli_free_result($resultado);
    } catch (Exception $e) {
        mysqli_close($conexion);
        //Salta este
        $respuesta = error_page("Práctica 1er CRUD", "<p>No se ha podido hacer la consulta: " . $e->getMessage() . "</p>");
    }
    return $respuesta;
}

if (isset($_POST["btn"])) {
    $error_nombre = $_POST["nombre"] == "" || strlen($_POST["nombre"]) > 30;
    $error_usuario = $_POST["usuario"] == "" || strlen($_POST["usuario"]) > 20;
    if (!$error_usuario) {
        try {
            $conection = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
            mysqli_set_charset($conection, "utf8");
        } catch (Exception $e) {
            die(error_page("Práctica 1er CRUD", "<p>No se ha podido conectar a la base de datos: " . $e->getMessage() . "</p>"));
        }
        $error_usuario = repetido($conection, "usuarios", "usuario", $_POST["usuario"]);
        if (is_string($error_usuario)) {
            die($error_usuario);
        }
    }

    $error_clave = $_POST["clave"] == "" || strlen($_POST["clave"]) > 10;
    $error_email = $_POST["email"] == "" || strlen($_POST["email"]) > 50 || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

    if (!isset($conection)) {
        try {
            $conection = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
            mysqli_set_charset($conection, "utf8");
        } catch (Exception $e) {
            die(error_page("Práctica 1er CRUD", "<p>No se ha podido conectar a la base de datos: " . $e->getMessage() . "</p>"));
        }
        try {
            $consulta =  "Select * from usuarios where email='" . $_POST["email"] . "'";
            $resultado = mysqli_query($conection, $consulta);
        } catch (Exception $e) {
            mysqli_close($conection);
            die(error_page("Práctica 1er CRUD", "<p>No se ha podido hacer la consulta: " . $e->getMessage() . "</p>"));
        }
    }

    $error_form = $error_nombre || $error_usuario || $error_clave || $error_email;

    if (!$error_form) {


        try {
            $consulta =  "INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `clave`, `email`) VALUES ('','" . $_POST["nombre"] . "','" . $_POST["usuario"] . "','" . md5($_POST["clave"]) . "','" . $_POST["email"] . "');";
            mysqli_query($conection, $consulta);
        } catch (Exception $e) {
            die(error_page("Práctica 1er CRUD", "<p>No se ha podido hacer la consulta: " . $e->getMessage() . "</p>"));
        }
        mysqli_close($conection);
        header("Location:index.php");
        exit;
    }
    if (isset($conection)) {
        mysqli_close($conection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form action="usuario_nuevo.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php if (isset($_POST["nombre"])) echo $_POST["nombre"] ?>">
            <?php
            if (isset($_POST["btn"]) && $error_nombre) {
                if (($_POST["nombre"]) == "") {
                    echo "<span class='error'> * El campo no puede estar vacío * </span>";
                } else {
                    echo "<span class='error'> * El campo no puede tener más de 30 caracteres * </span>";
                }
            }
            ?>
        </p>
        <p>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" value="<?php if (isset($_POST["usuario"])) echo $_POST["usuario"] ?>">
            <?php
            if (isset($_POST["btn"]) && $error_usuario) {
                if (($_POST["usuario"]) == "") {
                    echo "<span class='error'> * El campo no puede estar vacío * </span>";
                } else {
                    echo "<span class='error'> * El campo no puede tener más de 20 caracteres * </span>";
                }
            }
            ?>
        </p>
        <p>
            <label for="clave">Clave:</label>
            <input type="password" name="clave" id="clave" value="">
            <?php
            if (isset($_POST["btn"]) && $error_clave) {
                if (($_POST["clave"]) == "") {
                    echo "<span class='error'> * El campo no puede estar vacío * </span>";
                } else {
                    echo "<span class='error'> * El campo no puede tener más de 10 caracteres * </span>";
                }
            }
            ?>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"] ?>">
            <?php
            if (isset($_POST["btn"]) && $error_email) {
                if (($_POST["email"]) == "") {
                    echo "<span class='error'> * El campo no puede estar vacío * </span>";
                } else  if (strlen($_POST["email"]) > 50) {
                    echo "<span class='error'> * El campo no puede tener más de 50 caracteres * </span>";
                } else {
                    echo "<span class='error'> * El campo no tiene un formato válido * </span>";
                }
            }
            ?>
        </p>
        <p>
            <input type="submit" id="btn" name="btn" value="Continuar">
            <input type="submit" id="btnVolver" name="btnVolver" value="Volver">
        </p>
    </form>
    <?php
    if (isset($_POST["btnVolver"])) {
        header("Location:index.php");
        exit;
    }
    if (isset($_POST["btn"]) && !$error_form) {
    }
    ?>

</body>

</html>