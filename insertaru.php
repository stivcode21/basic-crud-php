<?php
    include 'conexio.php';

    if(isset($_POST['btn_insertar'])){
        $nombreProducto = trim($_POST['nombre_producto'] ?? '');
        $cantidad = isset($_POST['cantidad']) ? max(0, (int)$_POST['cantidad']) : 0;
        $unidadMedida = trim($_POST['unidad_medida'] ?? '');
        $proveedor = trim($_POST['proveedor'] ?? '');
        $precioUnitario = isset($_POST['precio_unitario']) ? max(0, (float)$_POST['precio_unitario']) : 0;
        $categoria = trim($_POST['categoria'] ?? '');

        $sql = "INSERT INTO productos(nombre, cantidad, unidad_medida, proveedor, precio_unitario, categoria) VALUES (:nombre, :cantidad, :unidad_medida, :proveedor, :precio_unitario, :categoria)";

        $sql = $connect->prepare($sql);
        $sql->bindParam(':nombre',$nombreProducto, PDO::PARAM_STR, 100);
        $sql->bindParam(':cantidad',$cantidad, PDO::PARAM_INT);
        $sql->bindParam(':unidad_medida',$unidadMedida, PDO::PARAM_STR, 50);
        $sql->bindParam(':proveedor',$proveedor, PDO::PARAM_STR, 100);
        $sql->bindParam(':precio_unitario',$precioUnitario);
        $sql->bindParam(':categoria',$categoria, PDO::PARAM_STR, 50);

        $sql->execute();
        $lastInsertId = $connect->lastInsertId();

        if($lastInsertId){
            echo "<script>window.location='consulta.php';</script>";
        }else{
            print_r($sql->errorInfo());
        }
    }
?>
