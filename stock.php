<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>stock de productos</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Stock en tiendas.</h1>
        <?php
            $conexion = new mysqli("localhost", "dwes", "dwes", "dwes");
            $consulta = $conexion->query("SELECT t.nombre, s.unidades FROM stock s JOIN tienda t ON s.tienda = t.cod WHERE s.producto = '" . $_GET["cod"] . "';");
            

        ?>

        
    </body>
</html>