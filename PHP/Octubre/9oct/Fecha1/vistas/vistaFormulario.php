<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas 1</title>
    <style>
        .formu{background-color: lightblue;border:1px solid black;}
        .resp{background-color: lightgreen;border:1px solid black;}
        h1{text-align: center;}
        .error{color:red;}
    </style>
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
    <div class="formu">
        <p>
            <h1>Fechas - Formulario</h1>
            <label for="fec1">Introduzca una fecha: (DD/MM/YYYY)</label>&nbsp;<input type="text" name="fec1" id="fec1" value="<?php if(isset($_POST["fec1"])) echo $_POST["fec1"]; ?>"/>
            <?php
            if(isset($_POST["btnEnviar"])&&$error_form){
                echo "<span class='error'> * Fecha introducida no válida * </span>";
            }
            ?>
            <br/>
            <label for="fec2">Introduzca una fecha: (DD/MM/YYYY)</label>&nbsp;<input type="text" name="fec2" id="fec2" value="<?php if(isset($_POST["fec2"])) echo $_POST["fec2"]; ?>"/>
            <?php
            if(isset($_POST["btnEnviar"])&&$error_form){
                echo "<span class='error'> * Fecha introducida no válida * </span>";
            }
            ?>
            <br/>
            <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar"/>
        </p>

    </div>
    </form>
    
</body>
</html>