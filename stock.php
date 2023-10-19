<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de productos</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Stock en tiendas.</h1>
        <?php
            include_once "stock.php";

            $conexion = new mysqli("localhost", "dwes", "dwes", "dwes");
            $consulta = $conexion->query("SELECT * FROM `dwes`.`stock` WHERE `producto` = '" . $_GET["cod"] . "'");
            echo "
                <table>
                    <tr>
                        <td>Producto</td>
                        <td>Tienda</td>
                        <td>Unidades</td>
                    </tr> ";

                    if ($consulta->num_rows > 0) {
                        while ($datos = $consulta->fetch_assoc()) {
                            echo "
                                    <tr> 
                                        <td>" . $datos['producto'] . "</td> 
                                        <td>" . $datos['tienda'] . "</td> 
                                        <td>" . $datos['unidades'] . "</td> 
                                    </tr>
                                ";  
                        }
                    }
            echo "</table>";

            echo $_GET["cod"];
        ?>
    </body>
</html>