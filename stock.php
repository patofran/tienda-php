<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>stock de productos</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <?php
            $conexion = new mysqli("localhost", "dwes", "dwes", "dwes");
            $dwes->autocommit(false);
            $unidadesCentral = null;
            $unidadesSucursal1 = null;
            $unidadesSucursal2 = null;
            $producto = null;

            //recogemos los datos para adaptar los cambios 

            if (isset($_GET["1"])) {
                $unidadesCentral = $_GET["1"];
            }

            if (isset($_GET["2"])) {
                $unidadesSucursal1 = $_GET["2"];
            }

            if (isset($_GET["3"])) {
                $unidadesSucursal2 = $_GET["3"];
            }

            if (isset($_GET["codigo"])) {
                $producto = $_GET["codigo"];
            }

            //hacemos los updates de las distintas tiendas

            if (isset($_GET["codigo"]) && isset($_GET["1"])) {
                $consulta = $conexion->query("UPDATE `stock` SET `unidades` = '$unidadesCentral' WHERE `stock`.`producto` = '$producto' AND `stock`.`tienda` = 1");
                $dwes->commit();
            }

            if (isset($_GET["codigo"]) && isset($_GET["2"])) {
                $consulta = $conexion->query("UPDATE `stock` SET `unidades` = '$unidadesSucursal1' WHERE `stock`.`producto` = '$producto' AND `stock`.`tienda` = 2");
                $dwes->commit();
            }

            if (isset($_GET["codigo"]) && isset($_GET["3"])) {
                $consulta = $conexion->query("UPDATE `stock` SET `unidades` = '$unidadesSucursal2' WHERE `stock`.`producto` = '$producto' AND `stock`.`tienda` = 3");
                $dwes->commit();
            }

            if (isset($_GET["codigo"])) {
                echo "<p>cambios en las tiendas hechos con exito <a href='productos.php'>Volver</a></p>";
            }

            //mostrar los datos.
            if (isset($_GET["cod"])) {
                $consulta = $conexion->query("SELECT s.tienda, t.nombre, s.unidades FROM stock s JOIN tienda t ON s.tienda = t.cod WHERE s.producto = '" . $_GET["cod"] . "';");
                echo "<h1>Stock del " . $_GET["cod"] ." producto en tiendas.</h1>";
                if ($consulta->num_rows > 0) {
                    while ($datos = $consulta->fetch_assoc()) {
                        echo "
                        <form action = '" . $_SERVER["PHP_SELF"] . "' method='get'>
                            <p>Tienda " . $datos["nombre"] . ": <input type = 'text' name = '" . $datos["tienda"] ."' value = '" . $datos["unidades"] ."'></p>
                        ";
                    }
                }
                echo "<br><br><input type= 'submit' value = 'Actualizar'><input type = 'hidden' name = 'codigo' value = '" . $_GET["cod"] . "'> </form>";
                $conexion->close();
            }

            /*
            
            UPDATE `stock` SET `unidades` = '6' WHERE `stock`.`producto` = 'ZENMP48GB300' AND `stock`.`tienda` = 1
            UPDATE `stock` SET `unidades` = '7' WHERE `stock`.`producto` = 'ZENMP48GB300' AND `stock`.`tienda` = 2
            UPDATE `stock` SET `unidades` = '8' WHERE `stock`.`producto` = 'ZENMP48GB300' AND `stock`.`tienda` = 3
            
            */
        ?>

    </body>
</html>

