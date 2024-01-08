<form action="index.php" method="post" enctype="multipart/form-data">
    <?php

    echo "<h2>Hola admin " . ucfirst($_SESSION["usuario"]) . "</h2>";

    try {
        $consulta = "SELECT * FROM usuarios WHERE tipo = 'normal'";
        $result = mysqli_query($conection, $consulta);
    } catch (Exception $e) {
        die(error_page("ERROR", $e));
    }
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Id</th><th>Usuario</th><th>Acciones</th></tr>";
        while ($tupla = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $tupla["id_usuario"] . "</td>";
            echo "<td><button class='enlace' type='submit' name='btnVer' id='btnVer' value='" . $tupla["id_usuario"] . "'>" . $tupla["usuario"] . "</button></td>";
            echo "<td><button class='enlace' type='submit' name='btnEditar' id='btnEditar' value='" . $tupla["id_usuario"] . "'>Editar</button> - <button class='enlace' type='submit'  name='btnBorrar' value='" . $tupla["id_usuario"] . "'>Borrar</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No hay actualmente usuarios no administradores en la BBDD</p>";
    }
    ?>

    <table>
        <tr>
            <th colspan=2>Otras acciones</th>
        </tr>
        <tr>
            <td> <button class='enlace' type="submit" name="btnSalir" id="btnSalir">Salir</button></td>
            <td><button class='enlace' type="submit" name="btnAgregar" id="btnAgregar">Agregar Usuario</button></td>
        </tr>

    </table>
</form>
<?php
if (isset($_POST["btnVer"])) {
    try {
        $consult = "SELECT * FROM usuarios WHERE id_usuario =" . $_POST['btnVer'];
        $data = mysqli_query($conection, $consult);
    } catch (Exception $e) {
        die(error_page("ERROR", $e));
    }
    $infoUser = mysqli_fetch_assoc($data);
    echo "<table>";
    echo "<tr><th>Campo</th><th>Valor</th></tr>";
    foreach ($infoUser as $key => $value) {
        echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
    }
    echo "</table>";
}
if (isset($_POST["btnAgregar"]) || isset($_POST["agregar"])) {
?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="userName"><strong>Nombre: </strong></label> <input type="text" name="userName" id="userName" placeholder="Nombre de usuario">
        <?php
        if (isset($_POST["agregar"]) && $error_nuevoName) {
            if ($_POST["userName"] == "") {
                echo "<span class='error'>* El campo no puede estar vacío *</span>";
            } else if (strlen($_POST["userName"]) > 50) {
                echo "<span class='error'>* El campo excede la longitud máxima *</span>";
            } else {
                echo "<span class='error'>* Ya hay un usuario con ese nombre en la BBDD *</span>";
            }
        }
        ?><br>
        <label for="userPass"><strong>Contraseña: </strong></label> <input type="pass" name="userPass" id="userPass" placeholder="Contraseña">
        <?php
        if (isset($_POST["agregar"]) && $error_nuevaClave) {
            if ($_POST["userPass"] == "") {
                echo "<span class='error'>* El campo no puede estar vacío *</span>";
            } else {
                echo "<span class='error'>* El campo excede la longitud máxima *</span>";
            }
        }
        ?><br>
        <label for="userMail"><strong>Correo: </strong></label> <input type="text" name="userMail" id="userMail" placeholder="E-mail">
        <?php
        if (isset($_POST["agregar"]) && $error_nuevoCorreo) {
            if ($_POST["userMail"] == "") {
                echo "<span class='error'>* El campo no puede estar vacío *</span>";
            } else if (strlen($_POST["userMail"]) > 30) {
                echo "<span class='error'>* El campo excede la longitud máxima *</span>";
            } else {
                echo "<span class='error'>* Ya hay un usuario con ese correo en la BBDD*</span>";
            }
        }
        ?><br>
        <span><strong>Tipo:</strong></span><br>
        <input type="radio" name="clase" value="admin" id="classAdmin"><label for="classAdmin">Administrador</label></radio><br>
        <input type="radio" name="clase" value="normal" id="classNormal" checked><label for="classNormal">Usuario normal</label></radio>
        <br>
        <button type="submit" id="btnAgregar" name="agregar">Agregar</button>
        <button type="submit" name="btnSalir" id="btnSalir">Salir</button>


    </form>
    <?php
    if (isset($_POST["agregar"]) && !$error_agregar) {
        try {
            $agregar = "INSERT INTO usuarios ('usuario', 'clave', 'correo', 'tipo') VALUES ($_POST[userName], $_POST[userPass], $_POST[userMail], $_POST[clase])";
            $resultato = mysqli_query($conection, $agregar);
        } catch (Exception $e) {
            die(error_page("ERROR", $e));
        }
        header("Location:index.php");
    }
    ?>
<?php
}
?>