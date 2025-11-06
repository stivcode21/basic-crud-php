<?php
    include 'conexio.php';

    if(isset($_POST['btn_insertar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

// Sentencia INSERT
        $sql = "insert into usuarios(nombre, apellido, edad, direccion, telefono, correo) VALUES(:nombre, :apellido, :edad, :direccion, :telefono, :correo)";

        // Preparar la sentencia
        $sql = $connect->prepare($sql);
        $sql->bindParam(':nombre',$nombre, PDO::PARAM_STR, 45);
        $sql->bindParam(':apellido',$apellido, PDO::PARAM_STR, 45);
        $sql->bindParam(':edad',$edad, PDO::PARAM_INT, 3);
        $sql->bindParam(':direccion',$direccion, PDO::PARAM_STR, 75);
        $sql->bindParam(':telefono',$telefono, PDO::PARAM_STR, 15);
        $sql->bindParam(':correo',$correo, PDO::PARAM_STR, 150);

        $sql->execute();
        // Obtener el ID del último registro insertado
        $lastInsertId = $connect->lastInsertId();

        if($lastInsertId){
            echo "<script>window.location='consulta.php';</script>";
        }else{
            print_r($sql->errorInfo());
        }
    } 
?>