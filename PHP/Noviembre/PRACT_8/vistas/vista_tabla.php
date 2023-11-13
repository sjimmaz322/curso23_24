<?php
//$conexion = mysqli_connect("localhost", "jose", "josefa", "bd_cv");
echo "<h2>Lista de Usuarios:</h2>";
try {
    $consulta = "select * from usuarios";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
}
//
echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
echo "<table>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Foto</th>";
echo "<th>Nombre</th>";
echo "<th><button class='enlace' type='submit' value='btnCrear' name='btnCrear'>Usuario+</button></th>";
echo "</tr>";
while ($tupla = mysqli_fetch_array($resultado)) {
    echo "<tr>";
    echo "<td>" . $tupla["id_usuario"] . "</td>";
    echo "<td><img class='normal' src='img/" . $tupla["foto"] . "' alt='foto perfil' name='foto_user' title='foto_user'></td>";
    echo "<td><button class='enlace' type='submit' name='btnDetalle' id='btnDetalle' value='" . $tupla["id_usuario"] . "'>" . $tupla["nombre"] . "</button></td>";
    echo "<td><button class='enlace' type='submit' value='editarUser' name='editarUser'>Editar</button> - <button class='enlace' type='submit' value='borrarUser' name='borrarUser'>Borrar</button></td>";
    echo "</tr>";
}
echo "</table>";
echo "</form>";
?>
<!---->