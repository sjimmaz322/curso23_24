<?php
if (isset($_POST["btnGuardar"])) {
?>
    <!-- Aquí corto el PHP y sigo con HTML -->
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
        echo "<p><strong>DNI: </strong>" . $_POST["dni"] . "</p>";

        echo "<p><strong>Sexo: </strong>" . $_POST["sex"] . "</p>";

        echo "<p><strong>Nacido en: </strong>" . $_POST["nacido"] . "</p>";
        echo "<p><strong>Comentarios: </strong>" . $_POST["comentarios"] . "</p>";

        if (isset($_POST["suscripcion"])) {
            echo "<p><strong>Subscripción: </strong>" . $_POST["suscripcion"] . "</p>";
        } else {
            echo "<p><strong>Subscripción: </strong>" . "off" . "</p>";
        }
        ?>
        <!-- Cierro el php y termino el html -->
    </body>

    </html>
    <!-- Termino el PHP -->
<?php
} else {
    header("location:index.php");
}
?>

<!--
    //$a[0] = 3;
    //$a[1] = 6;
    //$a[2] = -1;
    //$a[3] = 8;

    //for ($i = 0; $i < count($a); $i++) {
    //    echo "<p>Número: " . $a[$i] . "</p>";
    //}

    //Arrays recogidos depende del método usado, son asociativos
    //$_post
    //$_get

    //Array asociativo (En vez por index va por nombre) o escalar (como en java), son los tipos
    -->