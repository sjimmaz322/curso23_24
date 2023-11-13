<?php
require "src/ctes_funciones.php";

if (isset($_POST["btnContEditar"])) {
    $error_nombre = $_POST["nombre"] == "" || strlen($_POST["nombre"]) > 30;
    $error_usuario = $_POST["usuario"] == "" || strlen($_POST["usuario"]) > 20;
    if (!$error_usuario) {
        try {
            $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
            mysqli_set_charset($conexion, "utf8");
        } catch (Exception $e) {
            die(error_page("Práctica 1º CRUD", "<h1>Práctica 1º CRUD</h1><p>No he podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
        }

        $error_usuario = repetido_editando($conexion, "usuarios", "usuario", $_POST["usuario"], "id_usuario", $_POST["btnEditar"]);

        if (is_string($error_usuario))
            die($error_usuario);
    }

    $error_clave =  strlen($_POST["clave"]) > 15;
    $error_email = $_POST["email"] == "" || strlen($_POST["email"]) > 50 || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if (!$error_email) {
        if (!isset($conexion)) {
            try {
                $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
                mysqli_set_charset($conexion, "utf8");
            } catch (Exception $e) {
                die(error_page("Práctica 1º CRUD", "<h1>Práctica 1º CRUD</h1><p>No he podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
            }
        }
        $error_email = repetido_editando($conexion, "usuarios", "email", $_POST["email"], "id_usuario", $_POST["btnEditar"]);

        if (is_string($error_email))
            die($error_email);
    }
    $error_form = $error_nombre || $error_usuario || $error_clave || $error_email;
    if (!$error_form) {
        //EDITAMOS
        try {
            if ($_POST["clave"] == "") {
                $consulta = "update usuarios set nombre = '" . $_POST["nombre"] . "', usuario = '" . $_POST["usuario"] . "', email = '" . $_POST["email"] . "' where id_usuario = '" . $POST["btnContEditar"] . "'";
                mysqli_query($conexion, $consulta);
            } else {
                $consulta = "update usuarios set nombre = '" . $_POST["nombre"] . "', usuario = '" . $_POST["usuario"] . "',clave='" . md5($_POST["clave"]) . "', email = '" . $_POST["email"] . "' where id_usuario = '" . $POST["btnContEditar"] . "'";
                mysqli_query($conexion, $consulta);
            }
        } catch (Exception $e) {
            mysqli_close($conexion);
            die(error_page("Práctica 1º CRUD", "<h1>Práctica 1º CRUD</h1><p>No se ha podido hacer la consulta: " . $e->getMessage() . "</p>"));
        }

        mysqli_close($conexion);

        header("Location:index.php");
        exit;
    }
}

if (isset($_POST["btnContBorrar"])) {
    try {
        $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
        mysqli_set_charset($conexion, "utf8");
    } catch (Exception $e) {
        die(error_page("Práctica 1º CRUD", "<h1>Listado de los usuarios</h1><p>No ha podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
    }

    try {
        $consulta = "delete from usuarios where id_usuario='" . $_POST["btnContBorrar"] . "'";
        mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die(error_page("Práctica 1º CRUD", "<h1>Listado de los usuarios</h1><p>No ha podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
    }

    mysqli_close($conexion);
    header("Location:index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1º CRUD</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black
        }

        table {
            border-collapse: collapse;
            text-align: center
        }

        th {
            background-color: #CCC
        }

        table img {
            width: 50px;
        }

        .enlace {
            border: none;
            background: none;
            cursor: pointer;
            color: blue;
            text-decoration: underline
        }
    </style>
</head>

<body>
    <h1>Listado de los usuarios</h1>
    <?php
    if (!isset($conexion)) {
        try {
            $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
            mysqli_set_charset($conexion, "utf8");
        } catch (Exception $e) {
            die("<p>No ha podido conectarse a la base de batos: " . $e->getMessage() . "</p></body></html>");
        }
    }

    try {
        $consulta = "select * from usuarios";
        $resultado = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
    }

    echo "<table>";
    echo "<tr><th>Nombre de Usuario</th><th>Borrar</th><th>Editar</th></tr>";
    while ($tupla = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td><form action='index.php' method='post'><button class='enlace' type='submit' value='" . $tupla["id_usuario"] . "' name='btnDetalle' title='Detalles del Usuario'>" . $tupla["nombre"] . "</button></form></td>";
        echo "<td><form action='index.php' method='post'><input type='hidden' name='nombre_usuario' value='" . $tupla["nombre"] . "'><button class='enlace' type='submit' value='" . $tupla["id_usuario"] . "' name='btnBorrar'><img src='images/borrar.png' alt='Imagen de Borrar' title='Borrar Usuario'></button></form></td>";
        echo "<td><form action='index.php' method='post'><button class='enlace' type='submit' value='" . $tupla["id_usuario"] . "' name='btnEditar'><img src='images/editar.png' alt='Imagen de Editar' title='Editar Usuario'></button></form></td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($resultado);

    if (isset($_POST["btnDetalle"])) {
        echo "<h3>Detalles del usuario con id: " . $_POST["btnDetalle"] . "</h3>";
        try {
            $consulta = "select * from usuarios where id_usuario='" . $_POST["btnDetalle"] . "'";
            $resultado = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            mysqli_close($conexion);
            die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
        }

        if (mysqli_num_rows($resultado) > 0) {
            $datos_usuario = mysqli_fetch_assoc($resultado);
            mysqli_free_result($resultado);

            echo "<p>";
            echo "<strong>Nombre: </strong>" . $datos_usuario["nombre"] . "<br>";
            echo "<strong>Usuario: </strong>" . $datos_usuario["usuario"] . "<br>";
            echo "<strong>Email: </strong>" . $datos_usuario["email"];
            echo "</p>";
        } else
            echo "<p>El usuario seleccionado ya no se encuentra registrado en la BD</p>";


        echo "<form action='index.php' method='post'>";
        echo "<p><button type='submit'>Volver</button></p>";
        echo "</form>";
    } elseif (isset($_POST["btnBorrar"])) {
        echo "<p>Se dispone usted a borrar a usuario <strong>" . $_POST["nombre_usuario"] . "</strong></p>";
        echo "<form action='index.php' method='post'>";
        echo "<p><button type='submit' name='btnContBorrar' value='" . $_POST["btnBorrar"] . "'>Continuar</button> ";
        echo "<button type='submit'>Atrás</button></p>";
        echo "</form>";
    } elseif (isset($_POST["btnEditar"]) || isset($_POST["btnContEditar"])) {
        //Seguimos aquí
        if (isset($_POST["btnEditar"])) {
            $id_usuario = $_POST["btnEditar"];
        } else {
            $id_usuario = $_POST["btnContEditar"];
        }
        try {
            $consulta = "select * from usuarios where id_usuario='" . $id_usuario . "'";
            $resultado = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            mysqli_close($conexion);
            die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
        }
    } else {
    }
    //Control de errores
    if (mysqli_num_rows($resultado) > 0) {  
        if (isset($_POST["btnEditar"])) {
            $datos_usuario = mysqli_fetch_assoc($resultado);
            $id_usuario = $datos_usuario["id_usuario"];
            $nombre_usuario = $datos_usuario["nombre"];
            $usuario_usuario = $datos_usuario["usuario"];
            //$clave_usuario = $datos_usuario["clave"];
            $email_usuario = $datos_usuario["email"];
            //mysqli_free_result($resultado);
        } else {
            $nombre_usuario = $_POST["nombre"];
            $usuario_usuario = $_POST["usuario"];
            //$clave_usuario = $_POST["clave"];
            $email_usuario = $_POST["email"];
            mysqli_free_result($resultado);
        }
    } else {
        $mensaje_error = "<p>Usuario no encontrado</p>";
    }
    if (isset($mensaje_error)) {
        echo $mensaje_error;
    } else {
    ?>
        <h2>Editando el usuario <?php echo $id_usuario ?></h2>
        <form action="index.php" method="post">
            <p>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" maxlength="30" value="<?php echo $nombre_usuario; ?>">
                <?php
                if (isset($_POST["btnContEditar"]) && $error_nombre) {
                    if ($_POST["nombre"] == "")
                        echo "<span class='error'> Campo vacío</span>";
                    else
                        echo "<span class='error'> Has tecleado más de 30 caracteres</span>";
                }
                ?>
            </p>
            <p>
                <label for="usuario">Usuario: </label>
                <input type="text" name="usuario" id="usuario" maxlength="20" value="<?php echo $usuario_usuario; ?>">
                <?php
                if (isset($_POST["btnContEditar"]) && $error_usuario) {
                    if ($_POST["usuario"] == "")
                        echo "<span class='error'> Campo vacío</span>";
                    elseif (strlen($_POST["usuario"]) > 20)
                        echo "<span class='error'> Has tecleado más de 20 caracteres</span>";
                    else
                        echo "<span class='error'> Usuario repetido</span>";
                }
                ?>
            </p>
            <p>
                <label for="clave">Contraseña: </label>
                <input type="password" name="clave" maxlength="15" id="clave" placeholder="Cambiar contraseña">
                <?php
                if (isset($_POST["btnContInsertar"]) && $error_clave) {
                    if (strlen($_POST["clave"]) > 15)
                        echo "<span class='error'> Has tecleado más de 15 caracteres</span>";
                }
                ?>
            </p>
            <p>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" maxlength="50" value="<?php echo $email_usuario; ?>">
                <?php
                if (isset($_POST["btnContEditar"]) && $error_email) {
                    if ($_POST["email"] == "")
                        echo "<span class='error'> Campo vacío</span>";
                    elseif (strlen($_POST["email"]) > 50)
                        echo "<span class='error'> Has tecleado más de 50 caracteres</span>";
                    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
                        echo "<span class='error'> Email sintáxticamente incorrecto</span>";
                    else
                        echo "<span class='error'> Email repetido</span>";
                }
                ?>
            </p>
            <p>
                <button type="submit" name="btnContEditar" value=<?php $id_usuario ?>>Continuar</button>
                <button type="submit">Volver</button>
            </p>
        </form>
    <?php
    } {
        echo "<form action='usuario_nuevo.php' method='post'>";
        echo "<p><button type='submit' name='btnNuevoUsuario'>Insertar nuevo Usuario</button></p>";
        echo "</form>";
    }


    mysqli_close($conexion);

    ?>
</body>

</html>