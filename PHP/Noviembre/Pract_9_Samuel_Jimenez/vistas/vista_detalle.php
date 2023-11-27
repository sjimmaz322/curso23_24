<?php
try {
    $consulta = "select * from peliculas where idPelicula=" . $_POST["btnDetalle"];
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    session_destroy();
    mysqli_close($conexion);
    die(error_page("Error de Conexión", "<h1>Error de conexión</h1><p>No he podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
}
if (mysqli_num_rows($resultado) > 0) {
    $detalles = mysqli_fetch_array($resultado);
    mysqli_free_result($resultado);
    echo "<p>";
    echo "<h2>Mostrando los detalles de la película: <strong>" . $detalles["titulo"] . "</strong></h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID:</th><td>" . $detalles["idPelicula"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Título:</th><td>" . $detalles["titulo"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Director:</th><td>" . $detalles["director"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Sinopsis:</th><td>" . $detalles["sinopsis"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Temática:</th><td>" . $detalles["tematica"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Carátula:</th>";
    echo "<td><img class='profile' src='img/" . $detalles["caratula"] . "'></td>";
    echo "</tr>";
    echo "</table>";
    echo "</p>";
    echo "<form action='index.php' method='post'><button type='submit'>Volver</button></form>";
} else {
    echo "<p>No se ha encontrado la película con esa ID en la base de datos</p>";
}
