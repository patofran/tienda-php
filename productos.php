<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de productos</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Lista de productos.</h1>
        <?php
            $conexion = new mysqli("localhost", "dwes", "dwes", "dwes");
            $consulta = $conexion->query("SELECT `cod`, `nombre_corto`, `descripcion`, `PVP`, `familia` FROM `producto`;");
            echo "
                <table>
                    <legend>Para ver el stock de un producto pulsar en el nombre</legend>
                    <tr>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Descripcion</td>
                        <td>PVP</td>
                        <td>Familia</td>
                    </tr> ";

                    if ($consulta->num_rows > 0) {
                        while ($datos = $consulta->fetch_assoc()) {
                            echo "
                                    <tr> 
                                        <td>" . $datos['cod'] . "</td> 
                                        <td><a href='stock.php?cod=" . $datos['cod'] . "'>" . $datos['nombre_corto'] . "</a></td>
                                        <td>" . $datos['descripcion'] . "</td> 
                                        <td>" . $datos['PVP'] . "</td> 
                                        <td>" . $datos['familia'] . "</td>
                                    </tr>
                                ";  
                        }
                    }
            echo "</table>";
        ?>
    </body>
</html>