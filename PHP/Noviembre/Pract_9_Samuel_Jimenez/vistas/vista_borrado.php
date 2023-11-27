<?php

try {
    $consulta = "select * from peliculas where idPelicula=" . $_POST["borrarPeli"];
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    session_destroy();
    mysqli_close($conexion);
    die(error_page("Error de Conexión", "<h1>Error de conexión</h1><p>No he podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
}
if (mysqli_num_rows($resultado) > 0) {
    $datos_peli = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);
    echo "<h2>Desea borrar la película " . $datos_peli["titulo"] . "</h2>";
    echo "<table>";
    echo "<tr>";
    $_SESSION["id"] = $datos_peli["idPelicula"];
    echo "<th>ID:</th><td>" . $_SESSION["id"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Título:</th><td>" . $datos_peli["titulo"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Director:</th><td>" . $datos_peli["director"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Sinopsis:</th><td>" . $datos_peli["sinopsis"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Género:</th><td>" . $datos_peli["tematica"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Carátula:</th>";
    echo "<td><img class='profile' src='img/" . $datos_peli["caratula"] . "'></td>";
    echo "</tr>";
    echo "</table>";
    echo "<form action='index.php' method='post'>";
    echo "<p>¿Seguro que desea eliminar <strong>DEFINITIVAMENTE</strong> esta película?</p>";
    echo "<p><button type='submit' name='borrarDef' id='borrarDef' value='" . $_SESSION["id"] . "'>Borrar</button><button type='submit'>Volver</button></p>";
    echo "</form>";
} else {
    echo "<p>El usuario seleccionado ya no se encuentra registrado en la BD</p>";
}
