<?php
include '../../controller/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();

        $id = $_POST['id'];
        $nombre      = $_POST['cliente'];
        $direccion      = $_POST['direccion'];
        $establecimiento 	 = $_POST['establecimiento'];
        $telefono 	 = $_POST['telefono'];

        $update = ("UPDATE cliente
            SET 
            nombreCliente  ='" .$nombre. "',
            direccionCliente  ='" .$direccion. "',
            nombreEstablecimiento  ='" .$establecimiento. "',
            telefonoCliente  ='" .$telefono. "'
            WHERE id='" .$id. "'
        ");
        $result_update = mysqli_query($con, $update);

       echo "<script type='text/javascript'>
       alert('Usuario actualizado exitosamente');
        window.location='../vistas/cliente.php';
        </script>";
?>