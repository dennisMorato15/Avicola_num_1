<?php
include '../../controller/conexion.php';
$conexion = new Conexion();
$con = $conexion->conectarDB();

        $id = $_POST['id'];
        $nombre      = $_POST['nombre'];
        $apellido      = $_POST['apellido'];
        $correo 	 = $_POST['email'];
        $cargo 	 = $_POST['cargo'];
        $numero 	 = $_POST['numero'];

        $update = ("UPDATE usuario 
            SET 
            nombre  ='" .$nombre. "',
            apellido  ='" .$apellido. "',
            email  ='" .$correo. "',
            id_cargo  ='" .$cargo. "',
            numero = '" .$numero. "' 
            WHERE id='" .$id. "'
        ");
        $result_update = mysqli_query($con, $update);

       echo "<script type='text/javascript'>
       alert('Usuario actualizado exitosamente');
        window.location='../vistas/usuarios.php';
        </script>";
?>