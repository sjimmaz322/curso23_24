<?php
echo "<h2>Películas: </h2>";
try {
    $consulta = "select * from peliculas";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    session_destroy();
    mysqli_close($conexion);
    die(error_page("Error de Conexión", "<h1>Error de conexión</h1><p>No he podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
}
echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
echo "<table>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Título</th>";
echo "<th>Carátula</th>";
echo "<th><button class='enlace' type='submit' value='btnCrear' name='btnCrear'>Película+</button></th>";
echo "</tr>";
while ($tupla = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>" . $tupla["idPelicula"] . "</td>";
    echo "<td><button class='enlace' type='submit' name='btnDetalle' id='btnDetalle' value='" . $tupla["idPelicula"] . "'>" . $tupla["titulo"] . "</button></td>";
    echo "<td><img class='normal' src='img/" . $tupla["caratula"] . "' alt='Caratula' name='caratula' title='Carátula'></td>";
    echo "<td><button class='enlace' type='submit'  name='borrarPeli' id='borrarPeli' value='" . $tupla["idPelicula"] . "'>Borrar</button>
    -
    <button class='enlace' type='submit'  name='editarPeli' value='" . $tupla["idPelicula"] . "'>Editar</button></td>";
    echo "</tr>";
}
echo "</table>";
echo "</form>";
?>
