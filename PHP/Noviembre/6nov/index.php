<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    try {
        $conection = mysqli_connect("localhost", "jose", "josefa", "bd_foro");
    } catch (Exception $e) {
        die($e->getMessage() . "mysqli_close($conection)?></body></html>");
    }
    try {
        $consulta =  "Select * from usuarios";
        $resultado = mysqli_query($conection, $consulta);
    } catch (Exception $e) {
        mysqli_close($conection);
        die($e->getMessage() . "</body></html>");
    }


    echo "<table>";
    echo "<tr><th>Nombre</th><th>Editar</th><th>Borrar</th></tr>";
    while ($tupla = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $tupla["nombre"] . "</td>";
        echo "<td>" . "Editar" . "</td>";
        echo "<td>" . "Borrar" . "</td>";
        echo "</tr>";
    }


    echo "</table>";
    ?>
    <form action="usuario_nuevo.php" method="post" enctype="multipart/form-data">
        <input type="submit" name="btnIr" id="btnIr" value="Crear nuevo Usuario">
    </form>
</body>

</html>