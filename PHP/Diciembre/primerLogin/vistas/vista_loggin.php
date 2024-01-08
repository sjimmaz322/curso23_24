<?php

if (isset($_POST["btnLoggin"])) {

    $error_usuario = $_POST["user"] == "" || strlen($_POST["user"]) > 50;
    $error_clave =  $_POST["clave"] == "" || strlen($_POST["clave"]) > 20;
    $error_form = $error_usuario || $error_clave;
    if (!$error_form) {
        try {
            $conection = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD);
        } catch (Exception $e) {
            session_destroy();
            die(error_page("ERROR", $e));
        }
        try {
            $consulta = "SELECT * FROM usuarios WHERE usuario = '" . $_POST['user'] . "' AND clave = '" . md5($_POST['clave']) . "'";
            $resultado = mysqli_query($conection, $consulta);
        } catch (Exception $e) {
            session_destroy();
            die(error_page("ERROR", $e));
        }
        if (mysqli_num_rows($resultado) > 0) {
            $_SESSION["usuario"] = $_POST["user"];
            $_SESSION["clave"] = md5($_POST["clave"]);
            $_SESSION["ultima_accion"] = time();
            mysqli_free_result($resultado);
            mysqli_close($conection);
            header("Location:index.php");
            exit();
        } else {
            $error_usuario = true;
            mysqli_free_result($resultado);
            mysqli_close($conection);
            session_destroy();
        }
    }
}
?>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="user">Usuario:</label>
            <input type="text" name="user" id="user" value="<?php if (isset($_POST["user"])) echo $_POST["user"] ?>">
            <?php
            if (isset($_POST["btnLoggin"]) && $error_usuario) {
                if ($_POST["user"] == "") {
                    echo "<span class='error'>* El campo no puede estar vacío *</span>";
                } else if (strlen($_POST["user"]) > 50) {
                    echo "<span class='error'>* El campo excede la longitud máxima *</span>";
                } else {
                    echo "<span class='error'>* El usuario o contraseña no existe en la BBDD *</span>";
                }
            }
            ?>
        </p>
        <p>
            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" id="clave" value="">
            <?php
            if (isset($_POST["btnLoggin"]) && $error_clave) {
                if ($_POST["clave"] == "") {
                    echo "<span class='error'>* El campo no puede estar vacío *</span>";
                } else {
                    echo "<span class='error'>* El campo excede la longitud máxima *</span>";
                }
            }
            ?>
        </p>
        <p>
            <button type="submit" name="btnLoggin" id="btnLoggin">Ingresar</button>
        </p>
    </form>
    <?php
    if (isset($_SESSION["seguridad"])) {
        echo "<span class='mensaje'>" . $_SESSION['seguridad'] . "</span>";
        session_destroy();
    }
    ?>
