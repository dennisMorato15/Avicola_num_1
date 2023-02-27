<?php
    include '../../controller/conexion.php';
    $con = new Conexion();
    $con = $con->conectarDB();

            $directorio  = "../../img/";
            $archivo = $directorio . basename($_FILES["archivoSubir"]["name"]);
            $estado = 1;
            $tipoArchivo  = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            
            $imagenBD = $_POST['imagenBD'];

            if ($_FILES["archivoSubir"]["size"] == 0) {
                $archivo = $imagenBD;
            }else{
                    if (isset($_POST["submit"])) {
                        $verificar = getimagesize($_FILES["archivoSubir"]["tmp_name"]);

                        if ($verificar !== false) {
                            echo "El archivo es una imagnen";
                        }else{
                            echo "El archivo no es una imagen";
                            $estado = 0;
                        }
                    }
                    if ($_FILES["archivoSubir"]["size"] > 1000000) {
                        echo "</br>El tamaño del archivo excede el tamaño permitido";
                        $estado = 0;
                    }
            
                //Verificar si el archivo existe

                if (file_exists($archivo)) {
                    echo "</br>";
                        echo "El archivo ya existe en la ruta destino";
                    $estado = 0;
            }else{
                        echo "</br>";
                        echo "El archivo no existe en el directorio";
                }

                //Verificar tipo del archivo

                if ($tipoArchivo != "png" && $tipoArchivo != "jpg" && $tipoArchivo != "jpeg") {
                        echo "</br>Tipo de archivo no permitido";
                        $estado = 0;
                } else{
                        echo "</br> El archivo es de tipo ".$tipoArchivo;
                } 
                //Verificar si el archivo es apto para subir

                if ($estado == 0) {
                    echo "</br>Lo sentimos, su archivo no ha podido subirse";
                }else{
                if (move_uploaded_file($_FILES["archivoSubir"]["tmp_name"], $archivo)) {//se le puede contatenar, $directorio . "nombreArchivo" . $tipoArchivo para cambiar el nombre del archivo
                    echo "</br> El archivo ". basename($_FILES["archivoSubir"]["name"]) . " ha sido subido exitosamente!";
                }else {
                    echo "<br>Ha ocurrido un error";//compouser descargar
                }
                }
            $archivo = basename($_FILES["archivoSubir"]["name"]);
}

            $id = $_POST['id'];
            $nombre      = $_POST['nombreGalpon'];
            $capacidad 	 = $_POST['capacidadGalpon'];

            $update = ("UPDATE galpon 
                SET 
                nombreGalpon  ='" .$nombre. "',
                capacidadGalpon  ='" .$capacidad. "',
                imagenGalpon = '" .$archivo. "' 
                WHERE idGalpon='" .$id. "'
            ");
            $result_update = mysqli_query($con, $update);

           echo "<script type='text/javascript'>
                    window.location='../vistas/galpon.php';
                </script>";
                

?>