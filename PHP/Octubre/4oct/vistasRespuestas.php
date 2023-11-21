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