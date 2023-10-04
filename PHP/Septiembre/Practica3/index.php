<?php

$error_form = false;
if (isset($_POST["btnGuardar"])) { //Miro si hay errores
    $error_nombre = $_POST["nombre"] == "";
    $error_ape = $_POST["ape"] == "";
    $error_con = $_POST["con"] == "";
    $error_sexo = !isset($_POST["sex"]);
    $error_comentario = $_POST["comment"] == "";
    $error_form = $error_nombre || $error_ape || $error_con || $error_sexo || $error_comentario;
}
if (isset($_POST["btnGuardar"]) && !$error_form) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recogida de datos</title>
    </head>

    <body>
        <h1>Aquí recogemos los datos</h1>
        <!-- Meto código php en el html -->
        <?php
        echo "<p><strong>Nombre: </strong>" . $_POST["nombre"] . "</p>";
        echo "<p><strong>Apellidos: </strong>" . $_POST["ape"] . "</p>";
        echo "<p><strong>Contraseña: </strong>" . $_POST["con"] . "</p>";

        echo "<p><strong>Sexo: </strong>" . $_POST["sex"] . "</p>";

        echo "<p><strong>Nacido en: </strong>" . $_POST["nacido"] . "</p>";
        echo "<p><strong>Comentarios: </strong>" . $_POST["comment"] . "</p>";

        if (isset($_POST["suscripcion"])) {
            echo "<p><strong>Subscripción: </strong>" . $_POST["suscripcion"] . "</p>";
        } else {
            echo "<p><strong>Subscripción: </strong>" . "off" . "</p>";
        }
        ?>
        <!-- Cierro el php y termino el html -->
    </body>

    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .error {
                color: red
            }

            ;
        </style>
    </head>

    <body>
        <!-- <form action="index.php" method="get" enctype="multipart/form-data">-->
        <form action="index.php" method="post" enctype="multipart/form-data">
            <h2>Rellena tu CV</h2>
            <p>
                <label for="name">Nombre:</label></br>
                <input id="name" type=text name="nombre" value="<?php if (isset($_POST["nombre"])) echo $_POST['nombre']; ?>" />
                <?php
                if (isset($_POST["btnGuardar"]) && $error_nombre) {
                    echo "<span class='error'>El campo nombre es obligatorio</span>";
                }
                ?>
            </p>
            <!---->
            <p>
                <label for="ape">Apellidos:</label></br>

                <input id="ape" type=text size=40 name="ape" value="<?php if (isset($_POST["ape"])) echo $_POST['ape']; ?>" />
                <?php
                if (isset($_POST["btnGuardar"]) && $error_ape) {
                    echo "<span class='error'>El campo apellido es obligatorio</span>";
                }
                ?>
            </p>
            <!---->
            <p>
                <label for="con">Contraseña:</label></br>
                <input id="con" type=password name="con" />
                <?php
                if (isset($_POST["btnGuardar"]) && $error_con) {
                    echo "<span class='error'>El campo contraseña es obligatorio</span>";
                }
                ?>
            </p>
            <!---->
            <p>
            <p>Sexo <?php
                    if (isset($_POST["btnGuardar"]) && $error_sexo) {
                        echo "<span class='error'>El sexo es obligatorio</span>";
                    }
                    ?></p>
            <input type=radio id=hombre name=sex value=Hombre <?php if (isset($_POST["sex"]) && $_POST["sex"] == "Hombre") echo "checked"; ?> />
            <label for="hombre">Hombre</label></br>
            <input type=radio id="mujer" name=sex value=Mujer <?php if (isset($_POST["sex"]) && $_POST["sex"] == "Mujer") echo "checked"; ?> />
            <label for="mujer">Mujer</label></br>
            </p>
            <!---->
            <p>
                <label for="foto">Incluir mi foto: </label><input type=file name="foto" id="foto" accept="image/*" />
            </p>
            <!---->
            <p>
                <label for="nacido">Nacido en: </label>
                <select name="nacido" id="nacido">
                    <option value="Cordoba" <?php if (!isset($_POST["nacido"]) && $_POST["nacido"] == "Cordoba") echo "selected"; ?>>Córdoba</option>
                    <option value="Malaga" <?php if (!isset($_POST["nacido"]) && $_POST["nacido"] == "Malaga") echo "selected"; ?>>Málaga</option>
                    <option value="Granada" <?php if (!isset($_POST["nacido"]) || (!isset($_POST["nacido"]) && $_POST["nacido"] == "Granada")) echo "selected"; ?>>Granada</option>
                </select>
            </p>
            <!---->
            <p>
                <label for="comment">Comentarios:</label><textarea name="comment" id="comment" rows=7 cols=30></textarea>
                <?php
                if (isset($_POST["btnGuardar"]) && $error_comentario) {
                    echo "<span class='error'>El campo comentario es obligatorio</span>";
                }
                ?>
            </p>
            <!---->
            <p><input type=checkbox name="suscripcion" id="suscripcion" checked><label for="suscripcion">Subscribirme al boletín de Novedades</label></p>
            <!---->
            <p><button type=submit name="btnGuardar" value="enviado">Guardar Cambios</button>
                &nbsp;
                <button type=reset name="btnBorrar" value="borrado">Borrar los datos introducidos</button>
            </p>
        </form>
    </body>

    </html>
<?php

}
?>