<?php
require "src/ctes_funciones.php";

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
    } elseif (isset($_POST["btnEditar"])) {
        //Seguimos aquí
        try {
            $consulta = "select * from usuarios where id_usuario='" . $_POST["btnEditar"] . "'";
            $resultado = mysqli_query($conexion, $consulta);
        } catch (Exception $e) {
            mysqli_close($conexion);
            die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
        }
        //Control de errores
        if (mysqli_num_rows($resultado) > 0) {
            $datos_usuario = mysqli_fetch_assoc($resultado);
            mysqli_free_result($resultado);
        } else {
            $mensaje_error = "<p>Usuario no encontrado</p>";
        }
        if (isset($mensaje_error)) {
            echo $mensaje_error;
        } else {
            echo "<h2>Va a editar el usuario con id: " . $datos_usuario["id_usuario"] . "</h2>";
            echo "<form action='' method='post'>";
            echo "<p>";
            echo "<label for='nuevoName'><strong>Nombre: </strong></label>";
            echo "<input type='text' name='nuevoName' id='nuevoName' value='" . $datos_usuario["nombre"] . "'";
            echo "</p>";
            echo "<p>";
            echo "<label for='nuevoUser'><strong>Usuario: </strong></label>";
            echo "<input type='text' name='nuevoUser' id='nuevoUser' value='" . $datos_usuario["usuario"] . "'";
            echo "</p>";
            echo "<p>";
            echo "<label for='nuevoClave'><strong>Clave: </strong></label>";
            echo "<input type='password' name='nuevoClave' id='nuevoClave' value='' placeholder='Escriba aquí si desea modificar la contraseña'";
            echo "</p>";
            echo "<p>";
            echo "<label for='nuevoEmail'><strong>Email: </strong></label>";
            echo "<input type='text' name='nuevoEmail' id='nuevoEmail' value='" . $datos_usuario["email"] . "'";
            echo "</p>";
            echo "<p>";
            echo "<button type='submit' id='btnSobre' name='btnSobre'>Modificar</button>";
            echo "<button type='submit' id='btnPatras' name='btnPatras'>Atrás</button>";
            echo "</p>";
            echo "</form>";

            if (isset($_POST["btnPatras"])) {
                mysqli_close($conexion);

                header("Location:index.php");
                echo "<p>Miaumiau</p>";
            }
            if (isset($_POST["btnSobre"])) {
            }
        }
    } else {
        echo "<form action='usuario_nuevo.php' method='post'>";
        echo "<p><button type='submit' name='btnNuevoUsuario'>Insertar nuevo Usuario</button></p>";
        echo "</form>";
    }


    mysqli_close($conexion);

    ?>
</body>

</html>