<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/semantic.css">
    <script src="js/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <link rel="stylesheet" href="css/estilo.css">
    <title>Consultar productos</title>
</head>
<body>
    <div class="ui container">
        <br>
        <h1 class="texto">Inventario de productos</h1>
        <table class="ui green table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Unidad de medida</th>
                    <th>Proveedor</th>
                    <th>Precio unitario</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "conexio.php";
                $sql = "SELECT id_producto, nombre, cantidad, unidad_medida, proveedor, precio_unitario, categoria FROM productos ORDER BY id_producto DESC";
                $query = $connect->prepare($sql);
                $query->execute();
                $resultado = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($resultado as $producto) {?>
                    <tr>
                        <td><?php echo $producto->nombre ?></td>
                        <td><?php echo $producto->cantidad ?></td>
                        <td><?php echo $producto->unidad_medida ?></td>
                        <td><?php echo $producto->proveedor ?></td>
                        <td><?php echo $producto->precio_unitario ?></td>
                        <td><?php echo $producto->categoria ?></td>
                    </tr>
                <?php
                    }
                 } else { ?>
                    <tr>
                        <td colspan="6" class="center aligned">No hay productos registrados.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <a href="insertar.php"><input type="submit" class="ui inverted green button boton" value="Registrar nuevo producto"></a>
        <br>
    </div>
</body>
</html>
