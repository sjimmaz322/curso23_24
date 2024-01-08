
    <h1>Primer Loggin Correcto</h1>
    <?php
    echo "<h2>Hola user " . ucfirst($_SESSION["usuario"]) . "</h2>";
    ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <button type="submit" name="btnSalir" id="btnSalir">Salir</button>
    </form>
